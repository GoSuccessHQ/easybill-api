<?php

declare(strict_types=1);

/**
 * Documentation generator.
 *
 * Reflects every API resource and writes one Markdown page per public method
 * (i.e. per endpoint/function) under docs/, each with a usage example.
 *
 * Usage:
 *   php tools/generate-docs.php
 */

use GoSuccess\Easybill\Client;

require __DIR__ . '/../vendor/autoload.php';

const DOCS = __DIR__ . '/../docs';

// Map each resource property name on the Client to its resource class.
$client = new ReflectionClass(Client::class);
/** @var array<class-string, string> $propertyByClass */
$propertyByClass = [];

foreach ($client->getProperties() as $property) {
    $type = $property->getType();

    if ($type instanceof ReflectionNamedType) {
        /** @var class-string $class */
        $class = $type->getName();
        $propertyByClass[$class] = $property->getName();
    }
}

if (is_dir(DOCS)) {
    foreach (glob(DOCS . '/*/*.md') ?: [] as $file) {
        unlink($file);
    }
}

@mkdir(DOCS, 0o775, true);

/** @var array<string, list<array{method: string, file: string, summary: string}>> $index */
$index = [];
$pageCount = 0;

foreach ($propertyByClass as $class => $property) {
    $reflection = new ReflectionClass($class);
    $dir = DOCS . '/' . $property;
    @mkdir($dir, 0o775, true);

    foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->isConstructor() || $method->getDeclaringClass()->getName() !== $class) {
            continue;
        }

        $description = docDescription($method);
        $summary = explode("\n", $description)[0];
        $page = renderPage($property, $method, $description);
        $file = "{$dir}/{$method->getName()}.md";
        file_put_contents($file, $page);

        $index[$property][] = [
            'method' => $method->getName(),
            'file' => "{$property}/{$method->getName()}.md",
            'summary' => $summary,
        ];
        ++$pageCount;
    }
}

file_put_contents(DOCS . '/README.md', renderIndex($index));

printf("Generated %d documentation pages.\n", $pageCount);

// --- Rendering -------------------------------------------------------------

/**
 * The full doc block description: every line up to the first annotation, with
 * inline `{@see ...}` tags rendered as code spans. The first line doubles as the
 * one-line summary used in the index.
 */
function docDescription(ReflectionMethod $method): string
{
    $doc = $method->getDocComment();

    if ($doc === false) {
        return '';
    }

    $lines = [];

    foreach (explode("\n", $doc) as $line) {
        $line = trim($line, " \t*/");

        if (str_starts_with($line, '@')) {
            break;
        }

        if ($line === '' && $lines === []) {
            continue;
        }

        $lines[] = $line;
    }

    $description = rtrim(implode("\n", $lines));

    return preg_replace('/\{@see ([^}]+)\}/', '`$1`', $description) ?? $description;
}

function renderPage(string $property, ReflectionMethod $method, string $description): string
{
    $name = $method->getName();
    $signature = renderSignature($method);
    $params = renderParams($method);
    $endpoint = endpointHint($method);
    $example = renderExample($property, $method);
    $returns = renderReturnType($method->getReturnType());

    $page = "# `{$property}->{$name}()`\n\n";

    if ($description !== '') {
        $page .= "{$description}\n\n";
    }

    if ($endpoint !== null) {
        $page .= "**Endpoint:** `{$endpoint}`\n\n";
    }

    $page .= "## Signature\n\n```php\n{$signature}\n```\n\n";

    if ($params !== '') {
        $page .= "## Parameters\n\n{$params}\n\n";
    }

    $page .= "## Returns\n\n`{$returns}`\n\n";
    $page .= "## Example\n\n```php\n{$example}\n```\n";

    return $page;
}

function renderSignature(ReflectionMethod $method): string
{
    $parts = [];

    foreach ($method->getParameters() as $parameter) {
        $type = typeLabel($parameter->getType());
        $part = "{$type} \${$parameter->getName()}";

        if ($parameter->isDefaultValueAvailable()) {
            $part .= ' = ' . renderDefault($parameter->getDefaultValue());
        }

        $parts[] = $part;
    }

    $return = renderReturnType($method->getReturnType());

    return "public function {$method->getName()}(" . implode(', ', $parts) . "): {$return}";
}

function renderParams(ReflectionMethod $method): string
{
    if ($method->getNumberOfParameters() === 0) {
        return '';
    }

    $rows = ["| Name | Type | Required |", "| --- | --- | --- |"];

    foreach ($method->getParameters() as $parameter) {
        $type = typeLabel($parameter->getType());
        $required = $parameter->isOptional() ? 'no' : 'yes';
        $rows[] = "| `\${$parameter->getName()}` | `{$type}` | {$required} |";
    }

    return implode("\n", $rows);
}

function renderExample(string $property, ReflectionMethod $method): string
{
    $args = [];
    $imports = ['GoSuccess\\Easybill\\Client'];

    foreach ($method->getParameters() as $parameter) {
        $value = sampleArgument($parameter);

        if ($value === null) {
            continue;
        }

        $type = $parameter->getType();

        if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
            $imports[] = $type->getName();
        }

        $args[] = "{$parameter->getName()}: {$value}";
    }

    $call = "\$client->{$property}->{$method->getName()}(" . implode(', ', $args) . ')';
    $return = $method->getReturnType();
    $isVoid = $return instanceof ReflectionNamedType && $return->getName() === 'void';

    $imports = array_values(array_unique($imports));
    sort($imports);

    $lines = array_map(static fn (string $fqcn): string => "use {$fqcn};", $imports);
    $lines[] = '';
    $lines[] = '/** @var Client $client */';
    $lines[] = $isVoid ? "{$call};" : "\$result = {$call};";

    return implode("\n", $lines);
}

function sampleArgument(ReflectionParameter $parameter): ?string
{
    $type = $parameter->getType();
    $name = $parameter->getName();

    if (!$type instanceof ReflectionNamedType) {
        return $parameter->isOptional() ? null : "'...'";
    }

    if ($type->isBuiltin()) {
        // Skip optional scalars to keep the example focused on what matters.
        if ($parameter->isOptional() && !in_array($name, ['page', 'limit'], true)) {
            return null;
        }

        return match ($type->getName()) {
            'int' => sampleInt($name),
            'float' => '1.0',
            'bool' => 'true',
            'string' => "'...'",
            default => null,
        };
    }

    /** @var class-string $class */
    $class = $type->getName();
    $short = (new ReflectionClass($class))->getShortName();

    if (str_contains($class, '\\Enum\\')) {
        $cases = $class::cases();

        return $cases === [] ? null : "{$short}::{$cases[0]->name}";
    }

    // Models and filters
    return "new {$short}(/* ... */)";
}

function sampleInt(string $name): string
{
    return match (true) {
        str_contains($name, 'page') => '1',
        str_contains($name, 'limit') => '100',
        str_contains(strtolower($name), 'customer') => '12345',
        default => '123',
    };
}

function endpointHint(ReflectionMethod $method): ?string
{
    $class = $method->getDeclaringClass();
    $pathConst = $class->getConstant('PATH');

    if (!is_string($pathConst)) {
        return null;
    }

    return match ($method->getName()) {
        'list' => "GET /{$pathConst}",
        'get' => "GET /{$pathConst}/{id}",
        'create' => "POST /{$pathConst}",
        'update' => "PUT /{$pathConst}/{id}",
        'delete' => "DELETE /{$pathConst}/{id}",
        default => null,
    };
}

function renderReturnType(?ReflectionType $type): string
{
    return $type instanceof ReflectionNamedType ? typeLabel($type) : 'mixed';
}

function typeLabel(?ReflectionType $type): string
{
    if (!$type instanceof ReflectionNamedType) {
        return 'mixed';
    }

    $name = $type->getName();
    $short = str_contains($name, '\\') ? (new ReflectionClass($name))->getShortName() : $name;

    return ($type->allowsNull() && $name !== 'null' && $name !== 'mixed' ? '?' : '') . $short;
}

function renderDefault(mixed $value): string
{
    return match (true) {
        $value === null => 'null',
        $value === [] => '[]',
        is_bool($value) => $value ? 'true' : 'false',
        is_string($value) => "'{$value}'",
        default => (string) $value,
    };
}

/**
 * @param array<string, list<array{method: string, file: string, summary: string}>> $index
 */
function renderIndex(array $index): string
{
    ksort($index);
    $out = "# API Reference\n\n";
    $out .= "One page per resource method. See [examples/](../examples/) for runnable scripts.\n\n";

    foreach ($index as $property => $methods) {
        $out .= "## `{$property}`\n\n";

        foreach ($methods as $method) {
            $summary = $method['summary'] !== '' ? " — {$method['summary']}" : '';
            $out .= "- [`{$method['method']}()`]({$method['file']}){$summary}\n";
        }

        $out .= "\n";
    }

    return $out;
}
