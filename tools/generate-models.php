<?php

declare(strict_types=1);

/**
 * Code generator for the easybill API data models.
 *
 * Reads the official Swagger 2.0 specification and generates the enum and DTO
 * classes under src/Enum and src/Model. The generated files are committed to the
 * repository; this script only needs to be re-run when the API specification
 * changes.
 *
 * Usage:
 *   php tools/generate-models.php [path-to-swagger.json]
 *
 * When no path is given, the spec is downloaded from the official URL.
 */

const SPEC_URL = 'https://api.easybill.de/rest/v1/swagger.json';
const SRC = __DIR__ . '/../src';
const NS = 'GoSuccess\\Easybill';

$specPath = $argv[1] ?? null;
$json = $specPath !== null ? file_get_contents($specPath) : file_get_contents(SPEC_URL);

if ($json === false) {
    fwrite(STDERR, "Failed to read the specification.\n");
    exit(1);
}

/** @var array{definitions: array<string, array<string, mixed>>} $spec */
$spec = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
$definitions = $spec['definitions'];

// --- Helpers ---------------------------------------------------------------

function pascal(string $value): string
{
    $value = preg_replace('/(?<=[a-z0-9])(?=[A-Z])/', '_', $value) ?? $value;
    $parts = preg_split('/[^A-Za-z0-9]+/', $value) ?: [];
    $parts = array_filter($parts, static fn (string $p): bool => $p !== '');

    return implode('', array_map(
        static fn (string $p): string => ucfirst(strtolower($p)),
        $parts,
    ));
}

function camel(string $value): string
{
    return lcfirst(pascal($value));
}

function enumCaseName(int|string $value): string
{
    if (is_int($value)) {
        return 'Value' . ($value < 0 ? 'Minus' . abs($value) : (string) $value);
    }

    $name = pascal($value);

    if ($name === '') {
        $name = 'Empty';
    }

    if (ctype_digit($name[0])) {
        $name = 'Value' . $name;
    }

    return $name;
}

/**
 * @param list<int|string> $values
 */
function valuesetKey(string $type, array $values): string
{
    $sorted = $values;
    sort($sorted);

    return $type . '|' . implode(',', $sorted);
}

// --- Classify definitions --------------------------------------------------

/** @var array<string, array<string, mixed>> $enumDefinitions */
$enumDefinitions = [];

foreach ($definitions as $name => $def) {
    if (isset($def['enum']) && in_array($def['type'] ?? null, ['string', 'integer'], true)) {
        $enumDefinitions[$name] = $def;
    }
}

// --- Pre-pass: assign enum class names -------------------------------------

$intOverrides = [
    'integer|0,1,2,3,4,5,6' => 'Salutation',
    'integer|1,2,3,4,5,6,7,8' => 'AcquireOption',
    'integer|1,2,3,5' => 'PaymentOption',
    'integer|0,1' => 'CalcVatFrom',
];

$genericProps = ['status', 'type', 'items', 'category', 'priority', 'frequency', 'send_as'];

/** @var array<string, string> $enumNames key => class name */
$enumNames = [];
/** @var array<string, string> $usedNames name => key */
$usedNames = [];
/** @var array<string, array{type: string, values: list<int|string>}> $enumsToGenerate */
$enumsToGenerate = [];

// Seed overrides + enum-definitions so DTO refs resolve to them.
foreach ($intOverrides as $key => $className) {
    $enumNames[$key] = $className;
    $usedNames[$className] = $key;
}

foreach ($enumDefinitions as $name => $def) {
    /** @var list<int|string> $values */
    $values = $def['enum'];
    $key = valuesetKey($def['type'], $values);
    $enumNames[$key] = $name;
    $usedNames[$name] = $key;
    $enumsToGenerate[$name] = ['type' => $def['type'], 'values' => $values];
}

/**
 * Resolve (and lazily register) the enum class name for an enum schema.
 *
 * @param list<int|string> $values
 */
function resolveEnum(string $definition, string $property, string $type, array $values): string
{
    global $enumNames, $usedNames, $enumsToGenerate, $genericProps, $definitions;

    $key = valuesetKey($type, $values);

    if (isset($enumNames[$key])) {
        return $enumNames[$key];
    }

    if ($type === 'string' && in_array('document.create', $values, true)) {
        $base = 'WebHookEvent';
    } elseif (in_array($property, $genericProps, true) || isset($definitions[pascal($property)])) {
        // Generic property name, or one that would collide with a model class name.
        $base = pascal($definition) . pascal($property);
    } else {
        $base = pascal($property);
    }

    $name = $base;
    $suffix = 2;

    while ((isset($usedNames[$name]) && $usedNames[$name] !== $key) || isset($definitions[$name])) {
        $name = pascal($definition) . pascal($property);

        if ((isset($usedNames[$name]) && $usedNames[$name] !== $key) || isset($definitions[$name])) {
            $name = $base . $suffix++;
        }
    }

    $enumNames[$key] = $name;
    $usedNames[$name] = $key;
    $enumsToGenerate[$name] = ['type' => $type, 'values' => $values];

    return $name;
}

// --- Property type resolution ----------------------------------------------

/**
 * @param array<string, mixed> $schema
 *
 * @return array{php: string, doc: string, kind: string, item?: array{kind: string, php: string}}
 */
function resolveType(string $definition, string $property, array $schema): array
{
    global $enumDefinitions;

    if (isset($schema['$ref'])) {
        $ref = basename((string) $schema['$ref']);

        if (isset($enumDefinitions[$ref])) {
            return ['php' => $ref, 'doc' => $ref, 'kind' => 'enum'];
        }

        return ['php' => $ref, 'doc' => $ref, 'kind' => 'model'];
    }

    if (isset($schema['enum']) && in_array($schema['type'] ?? null, ['string', 'integer'], true)) {
        /** @var list<int|string> $values */
        $values = $schema['enum'];
        $name = resolveEnum($definition, $property, (string) $schema['type'], $values);

        return ['php' => $name, 'doc' => $name, 'kind' => 'enum'];
    }

    $type = $schema['type'] ?? 'string';

    return match ($type) {
        'integer' => ['php' => 'int', 'doc' => 'int', 'kind' => 'scalar'],
        'number' => ['php' => 'float', 'doc' => 'float', 'kind' => 'scalar'],
        'boolean' => ['php' => 'bool', 'doc' => 'bool', 'kind' => 'scalar'],
        'array' => resolveArrayType($definition, $property, $schema),
        'object' => ['php' => 'array', 'doc' => 'array<string, mixed>', 'kind' => 'raw'],
        default => ['php' => 'string', 'doc' => 'string', 'kind' => 'scalar'],
    };
}

/**
 * @param array<string, mixed> $schema
 *
 * @return array{php: string, doc: string, kind: string, item: array{kind: string, php: string}}
 */
function resolveArrayType(string $definition, string $property, array $schema): array
{
    /** @var array<string, mixed> $items */
    $items = $schema['items'] ?? [];
    $item = resolveType($definition, $property, $items);

    $doc = match ($item['kind']) {
        'model', 'enum' => "list<{$item['php']}>",
        'scalar' => "list<{$item['php']}>",
        default => 'list<mixed>',
    };

    return [
        'php' => 'array',
        'doc' => $doc,
        'kind' => 'array',
        'item' => ['kind' => $item['kind'], 'php' => $item['php']],
    ];
}

// --- Collect properties for a definition (resolving allOf) -----------------

/**
 * @param array<string, mixed> $def
 *
 * @return array{props: array<string, array<string, mixed>>, readOnly: array<string, bool>, listItem: ?string}
 */
function collectProperties(string $name, array $def): array
{
    global $definitions;

    $props = [];
    $readOnly = [];
    $listItem = null;

    $schemas = [$def];

    if (isset($def['allOf']) && is_array($def['allOf'])) {
        $schemas = $def['allOf'];
    }

    foreach ($schemas as $schema) {
        if (isset($schema['$ref'])) {
            $ref = basename((string) $schema['$ref']);

            if ($ref === 'List') {
                continue; // pagination fields are added explicitly for Listing types
            }

            $schema = $definitions[$ref] ?? [];
        }

        foreach ($schema['properties'] ?? [] as $propName => $propSchema) {
            if ($propName === 'items' && isset($propSchema['items']['$ref'])) {
                $listItem = basename((string) $propSchema['items']['$ref']);
            }

            $props[$propName] = $propSchema;
            $readOnly[$propName] = (bool) ($propSchema['readOnly'] ?? false);
        }
    }

    return ['props' => $props, 'readOnly' => $readOnly, 'listItem' => $listItem];
}

function isListing(array $def): bool
{
    foreach ($def['allOf'] ?? [] as $schema) {
        if (isset($schema['$ref']) && basename((string) $schema['$ref']) === 'List') {
            return true;
        }
    }

    return false;
}

// --- Generation ------------------------------------------------------------

@mkdir(SRC . '/Enum', 0o775, true);
@mkdir(SRC . '/Model', 0o775, true);

// Files that are hand-written and must never be removed by regeneration.
$protected = [
    SRC . '/Enum/Salutation.php',
    SRC . '/Enum/AcquireOption.php',
    SRC . '/Enum/PaymentOption.php',
    SRC . '/Enum/CalcVatFrom.php',
    SRC . '/Enum/DocumentSendType.php',
    SRC . '/Enum/DocumentConvertTarget.php',
    SRC . '/Model/Model.php',
    SRC . '/Model/Listing.php',
    SRC . '/Model/AbstractModel.php',
];

foreach ([SRC . '/Enum', SRC . '/Model'] as $dir) {
    foreach (glob("{$dir}/*.php") ?: [] as $file) {
        if (!in_array($file, $protected, true)) {
            unlink($file);
        }
    }
}

$generatedEnums = [];
$generatedModels = [];

foreach ($definitions as $name => $def) {
    if ($name === 'List' || isset($enumDefinitions[$name])) {
        continue;
    }

    $info = collectProperties($name, $def);
    $listing = isListing($def);
    [$code, $usesEnum] = generateModel($name, $info['props'], $info['readOnly'], $listing, $info['listItem']);
    file_put_contents(SRC . "/Model/{$name}.php", $code);
    $generatedModels[] = $name;
}

// Enums are registered lazily during model generation; emit them afterwards.
foreach ($enumsToGenerate as $className => $enum) {
    file_put_contents(SRC . "/Enum/{$className}.php", generateEnum($className, $enum['type'], $enum['values']));
    $generatedEnums[] = $className;
}

// Typed filter objects for the list endpoints (enum names are now fully resolved).
$generatedFilters = generateFilters();

sort($generatedEnums);
sort($generatedModels);

printf(
    "Generated %d enums, %d models and %d filters.\n",
    count($generatedEnums),
    count($generatedModels),
    $generatedFilters,
);

// --- Code emitters ---------------------------------------------------------

/**
 * @param list<int|string> $values
 */
function generateEnum(string $className, string $type, array $values): string
{
    $backing = $type === 'integer' ? 'int' : 'string';
    $cases = '';
    $seen = [];

    foreach ($values as $value) {
        $caseName = enumCaseName($value);
        $original = $caseName;
        $i = 2;

        while (isset($seen[$caseName])) {
            $caseName = $original . $i++;
        }

        $seen[$caseName] = true;

        $literal = is_int($value) ? (string) $value : "'" . str_replace("'", "\\'", $value) . "'";
        $cases .= "    case {$caseName} = {$literal};\n";
    }

    return <<<PHP
        <?php

        declare(strict_types=1);

        namespace GoSuccess\\Easybill\\Enum;

        enum {$className}: {$backing}
        {
        {$cases}}

        PHP;
}

/**
 * @param array<string, array<string, mixed>> $props
 * @param array<string, bool>                 $readOnly
 *
 * @return array{0: string, 1: bool}
 */
function generateModel(string $name, array $props, array $readOnly, bool $listing, ?string $listItem): array
{
    $imports = [];
    $ctorParams = [];
    $fromAssigns = [];
    $toLines = [];

    if ($listing) {
        $itemType = $listItem ?? 'Model';
        $imports[$itemType] = true;

        $metaDefaults = ['page' => 1, 'pages' => 1, 'limit' => 0, 'total' => 0];

        foreach ($metaDefaults as $metaProp => $default) {
            $ctorParams[] = "        public int \${$metaProp} = {$default},";
        }

        $ctorParams[] = "        /** @var list<{$itemType}> */\n        public array \$items = [],";

        foreach ($metaDefaults as $metaProp => $default) {
            $fromAssigns[] = "            {$metaProp}: self::asInt(\$data['{$metaProp}'] ?? null) ?? {$default},";
        }

        $fromAssigns[] = "            items: self::asModelList({$itemType}::class, \$data['items'] ?? null),";
    }

    foreach ($props as $jsonKey => $schema) {
        if ($listing && in_array($jsonKey, ['page', 'pages', 'limit', 'total', 'items'], true)) {
            continue;
        }

        $phpName = camel($jsonKey);
        $type = resolveType($name, $jsonKey, $schema);

        if (in_array($type['kind'], ['model', 'enum'], true)) {
            $imports[$type['php']] = true;
        }

        if ($type['kind'] === 'array' && in_array($type['item']['kind'], ['model', 'enum'], true)) {
            $imports[$type['item']['php']] = true;
        }

        if ($type['kind'] === 'array') {
            $ctorParams[] = "        /** @var {$type['doc']} */\n        public array \${$phpName} = [],";
        } elseif ($type['kind'] === 'raw') {
            $ctorParams[] = "        /** @var {$type['doc']}|null */\n        public ?array \${$phpName} = null,";
        } else {
            $ctorParams[] = "        public ?{$type['php']} \${$phpName} = null,";
        }

        $fromAssigns[] = '            ' . $phpName . ': ' . fromExpr($jsonKey, $type) . ',';

        if (!($readOnly[$jsonKey] ?? false)) {
            $toLines[] = toLine($jsonKey, $phpName, $type);
        }
    }

    $useStatements = '';
    unset($imports['Model']);
    $modelImports = array_keys($imports);
    sort($modelImports);

    foreach ($modelImports as $import) {
        if (isset($GLOBALS['enumsToGenerate'][$import]) || in_array($import, array_values($GLOBALS['intOverrides']), true)) {
            $useStatements .= 'use ' . NS . "\\Enum\\{$import};\n";
        } else {
            // Model in the same namespace — no import needed.
            continue;
        }
    }

    $extends = $listing ? 'extends AbstractModel implements Listing' : 'extends AbstractModel';
    $ctor = implode("\n", $ctorParams);
    $from = implode("\n", $fromAssigns);
    $to = implode("\n", $toLines);

    $code = <<<PHP
        <?php

        declare(strict_types=1);

        namespace GoSuccess\\Easybill\\Model;

        {$useStatements}/**
         * @see https://api.easybill.de/rest/v1/swagger.json {$name}
         */
        final readonly class {$name} {$extends}
        {
            public function __construct(
        {$ctor}
            ) {}

            public static function fromArray(array \$data): static
            {
                return new self(
        {$from}
                );
            }

            public function toArray(): array
            {
                \$data = [];
        {$to}

                return \$data;
            }
        }

        PHP;

    return [$code, $useStatements !== ''];
}

/**
 * @param array{php: string, doc: string, kind: string, item?: array{kind: string, php: string}} $type
 */
function fromExpr(string $jsonKey, array $type): string
{
    $access = "\$data['{$jsonKey}'] ?? null";

    return match ($type['kind']) {
        'scalar' => match ($type['php']) {
            'int' => "self::asInt({$access})",
            'float' => "self::asFloat({$access})",
            'bool' => "self::asBool({$access})",
            default => "self::asString({$access})",
        },
        'enum' => "self::asEnum({$type['php']}::class, {$access})",
        'model' => "self::asModel({$type['php']}::class, {$access})",
        'raw' => "self::asArray({$access})",
        'array' => arrayFromExpr($access, $type['item']),
        default => $access,
    };
}

/**
 * @param array{kind: string, php: string} $item
 */
function arrayFromExpr(string $access, array $item): string
{
    return match ($item['kind']) {
        'model' => "self::asModelList({$item['php']}::class, {$access})",
        'enum' => "self::asEnumList({$item['php']}::class, {$access})",
        default => match ($item['php']) {
            'int' => "self::asIntList({$access})",
            'float' => "self::asFloatList({$access})",
            'bool' => "self::asBoolList({$access})",
            default => "self::asStringList({$access})",
        },
    };
}

/**
 * @param array{php: string, doc: string, kind: string, item?: array{kind: string, php: string}} $type
 */
function toLine(string $jsonKey, string $phpName, array $type): string
{
    $prop = "\$this->{$phpName}";

    // Nested models: skip when the serialized object would be empty (e.g. read-only objects).
    if ($type['kind'] === 'model') {
        return "        if ({$prop} !== null) {\n"
            . "            \$nested = {$prop}->toArray();\n\n"
            . "            if (\$nested !== []) {\n"
            . "                \$data['{$jsonKey}'] = \$nested;\n"
            . "            }\n"
            . '        }';
    }

    $condition = $type['kind'] === 'array' ? "{$prop} !== []" : "{$prop} !== null";

    $value = match ($type['kind']) {
        'enum' => "{$prop}->value",
        'array' => arrayToExpr($prop, $type['item']),
        default => $prop,
    };

    return "        if ({$condition}) {\n            \$data['{$jsonKey}'] = {$value};\n        }";
}

/**
 * @param array{kind: string, php: string} $item
 */
function arrayToExpr(string $prop, array $item): string
{
    return match ($item['kind']) {
        'model' => "array_map(static fn ({$item['php']} \$item): array => \$item->toArray(), {$prop})",
        'enum' => "array_map(static fn ({$item['php']} \$item) => \$item->value, {$prop})",
        default => $prop,
    };
}

// --- Filter generation -----------------------------------------------------

/**
 * Generate typed filter DTOs for every list endpoint that accepts query filters.
 *
 * @return int Number of generated filter classes.
 */
function generateFilters(): int
{
    global $spec;

    $map = [
        '/customers' => 'CustomerFilter',
        '/documents' => 'DocumentFilter',
        '/positions' => 'PositionFilter',
        '/projects' => 'ProjectFilter',
        '/time-trackings' => 'TimeTrackingFilter',
        '/document-payments' => 'DocumentPaymentFilter',
        '/post-boxes' => 'PostBoxFilter',
        '/sepa-payments' => 'SepaPaymentFilter',
        '/serial-numbers' => 'SerialNumberFilter',
        '/stocks' => 'StockFilter',
        '/discounts/position' => 'DiscountPositionFilter',
        '/discounts/position-group' => 'DiscountPositionGroupFilter',
        '/pdf-templates' => 'PdfTemplateFilter',
    ];

    $dir = SRC . '/Filter';
    @mkdir($dir, 0o775, true);

    foreach (glob("{$dir}/*.php") ?: [] as $file) {
        unlink($file);
    }

    $count = 0;

    foreach ($map as $path => $className) {
        $params = [];

        foreach ($spec['paths'][$path]['get']['parameters'] ?? [] as $param) {
            if (isset($param['$ref']) || ($param['in'] ?? null) !== 'query') {
                continue;
            }

            $params[] = $param;
        }

        if ($params === []) {
            continue;
        }

        file_put_contents("{$dir}/{$className}.php", generateFilter($className, $params));
        ++$count;
    }

    return $count;
}

/**
 * @param list<array<string, mixed>> $params
 */
function generateFilter(string $className, array $params): string
{
    $imports = [];
    $ctorParams = [];
    $queryLines = [];

    foreach ($params as $param) {
        $jsonKey = (string) $param['name'];
        $phpName = camel($jsonKey);
        $kind = filterKind($param);

        if ($kind['kind'] === 'enum') {
            $imports[$kind['php']] = true;
        }

        if ($kind['kind'] === 'csv') {
            $ctorParams[] = "        /** @var list<string>|null */\n        public ?array \${$phpName} = null,";
        } else {
            $ctorParams[] = "        public ?{$kind['php']} \${$phpName} = null,";
        }

        $value = match ($kind['kind']) {
            'enum' => "\$this->{$phpName}->value",
            'bool01' => "\$this->{$phpName} ? '1' : '0'",
            'csv' => "implode(',', \$this->{$phpName})",
            default => "\$this->{$phpName}",
        };

        $queryLines[] = "        if (\$this->{$phpName} !== null) {\n            \$query['{$jsonKey}'] = {$value};\n        }";
    }

    $useStatements = '';
    $importNames = array_keys($imports);
    sort($importNames);

    foreach ($importNames as $import) {
        $useStatements .= 'use ' . NS . "\\Enum\\{$import};\n";
    }

    $ctor = implode("\n", $ctorParams);
    $query = implode("\n", $queryLines);

    return <<<PHP
        <?php

        declare(strict_types=1);

        namespace GoSuccess\\Easybill\\Filter;

        {$useStatements}/**
         * Typed query filters for the corresponding list endpoint.
         */
        final readonly class {$className}
        {
            public function __construct(
        {$ctor}
            ) {}

            /**
             * @return array<string, scalar|null>
             */
            public function toQuery(): array
            {
                \$query = [];
        {$query}

                return \$query;
            }
        }

        PHP;
}

/**
 * @param array<string, mixed> $param
 *
 * @return array{php: string, kind: string}
 */
function filterKind(array $param): array
{
    global $enumNames;

    $type = $param['type'] ?? 'string';

    if ($type === 'array') {
        return ['php' => 'array', 'kind' => 'csv'];
    }

    if (isset($param['enum']) && is_array($param['enum'])) {
        /** @var list<int|string> $enum */
        $enum = $param['enum'];
        $sorted = $enum;
        sort($sorted);

        if ($sorted === ['0', '1']) {
            return ['php' => 'bool', 'kind' => 'bool01'];
        }

        $key = valuesetKey('string', $enum);

        if (isset($enumNames[$key])) {
            return ['php' => $enumNames[$key], 'kind' => 'enum'];
        }

        return ['php' => 'string', 'kind' => 'scalar'];
    }

    return match ($type) {
        'integer' => ['php' => 'int', 'kind' => 'scalar'],
        'number' => ['php' => 'float', 'kind' => 'scalar'],
        'boolean' => ['php' => 'bool', 'kind' => 'scalar'],
        default => ['php' => 'string', 'kind' => 'scalar'],
    };
}
