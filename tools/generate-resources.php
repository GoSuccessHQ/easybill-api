<?php

declare(strict_types=1);

/**
 * Code generator for the plain (CRUD / partial) API resource classes.
 *
 * The resources with special endpoints — documents, customer contacts and
 * pdf-templates — are hand-written and not produced by this script.
 *
 * Usage:
 *   php tools/generate-resources.php
 */

const RES_DIR = __DIR__ . '/../src/Resource';

/**
 * Each entry: name, URL path, model, collection, filter class (or null),
 * capabilities and optional extra method snippets.
 *
 * @var list<array{
 *   name: string, path: string, model: string, collection: string,
 *   filter: ?string, caps: list<string>, extras?: string
 * }> $resources
 */
$resources = [
    ['name' => 'Customer', 'path' => 'customers', 'model' => 'Customer', 'collection' => 'Customers', 'filter' => 'CustomerFilter', 'caps' => ['get', 'create', 'update', 'delete'], 'extras' => extraTransferSepaMandate()],
    ['name' => 'CustomerGroup', 'path' => 'customer-groups', 'model' => 'CustomerGroup', 'collection' => 'CustomerGroups', 'filter' => null, 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'DocumentPayment', 'path' => 'document-payments', 'model' => 'DocumentPayment', 'collection' => 'DocumentPayments', 'filter' => 'DocumentPaymentFilter', 'caps' => ['get', 'create', 'delete']],
    ['name' => 'Position', 'path' => 'positions', 'model' => 'Position', 'collection' => 'Positions', 'filter' => 'PositionFilter', 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'PositionGroup', 'path' => 'position-groups', 'model' => 'PositionGroup', 'collection' => 'PositionGroups', 'filter' => null, 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'DiscountPosition', 'path' => 'discounts/position', 'model' => 'DiscountPosition', 'collection' => 'DiscountPositions', 'filter' => 'DiscountPositionFilter', 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'DiscountPositionGroup', 'path' => 'discounts/position-group', 'model' => 'DiscountPositionGroup', 'collection' => 'DiscountPositionGroups', 'filter' => 'DiscountPositionGroupFilter', 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'Project', 'path' => 'projects', 'model' => 'Project', 'collection' => 'Projects', 'filter' => 'ProjectFilter', 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'Task', 'path' => 'tasks', 'model' => 'Task', 'collection' => 'Tasks', 'filter' => null, 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'TextTemplate', 'path' => 'text-templates', 'model' => 'TextTemplate', 'collection' => 'TextTemplates', 'filter' => null, 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'TimeTracking', 'path' => 'time-trackings', 'model' => 'TimeTracking', 'collection' => 'TimeTrackings', 'filter' => 'TimeTrackingFilter', 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'Attachment', 'path' => 'attachments', 'model' => 'Attachment', 'collection' => 'Attachments', 'filter' => null, 'caps' => ['get', 'create', 'update', 'delete'], 'extras' => extraAttachmentContent()],
    ['name' => 'PostBox', 'path' => 'post-boxes', 'model' => 'PostBox', 'collection' => 'PostBoxes', 'filter' => 'PostBoxFilter', 'caps' => ['get', 'delete']],
    ['name' => 'SepaPayment', 'path' => 'sepa-payments', 'model' => 'SEPAPayment', 'collection' => 'SEPAPayments', 'filter' => 'SepaPaymentFilter', 'caps' => ['get', 'create', 'update', 'delete']],
    ['name' => 'SerialNumber', 'path' => 'serial-numbers', 'model' => 'SerialNumber', 'collection' => 'SerialNumbers', 'filter' => 'SerialNumberFilter', 'caps' => ['get', 'create', 'delete']],
    ['name' => 'Stock', 'path' => 'stocks', 'model' => 'Stock', 'collection' => 'Stocks', 'filter' => 'StockFilter', 'caps' => ['get', 'create']],
    ['name' => 'Login', 'path' => 'logins', 'model' => 'Login', 'collection' => 'Logins', 'filter' => null, 'caps' => ['get']],
    ['name' => 'Webhook', 'path' => 'webhooks', 'model' => 'WebHook', 'collection' => 'WebHooks', 'filter' => null, 'caps' => ['get', 'create', 'update', 'delete']],
];

foreach ($resources as $resource) {
    $code = generateResource($resource);
    file_put_contents(RES_DIR . "/{$resource['name']}Resource.php", $code);
    echo "wrote {$resource['name']}Resource.php\n";
}

printf("Generated %d resources.\n", count($resources));

/**
 * @param array{name: string, path: string, model: string, collection: string, filter: ?string, caps: list<string>, extras?: string} $resource
 */
function generateResource(array $resource): string
{
    ['name' => $name, 'path' => $path, 'model' => $model, 'collection' => $coll, 'filter' => $filter] = $resource;
    $var = lcfirst($model);
    $extras = $resource['extras'] ?? '';

    $imports = [
        "use GoSuccess\\Easybill\\Model\\{$model};",
        "use GoSuccess\\Easybill\\Model\\{$coll};",
        'use GoSuccess\\Easybill\\Pagination\\Paginator;',
    ];

    if ($filter !== null) {
        $imports[] = "use GoSuccess\\Easybill\\Filter\\{$filter};";
    }

    if (str_contains($extras, 'Method::')) {
        $imports[] = 'use GoSuccess\\Easybill\\Http\\Method;';
    }

    sort($imports);
    $useStatements = implode("\n", $imports);

    $listSignature = $filter !== null
        ? "int \$page = 1, int \$limit = 100, ?{$filter} \$filter = null"
        : 'int $page = 1, int $limit = 100';
    $listQuery = $filter !== null
        ? "['page' => \$page, 'limit' => \$limit, ...(\$filter?->toQuery() ?? [])]"
        : "['page' => \$page, 'limit' => \$limit]";

    $allSignature = $filter !== null ? "?{$filter} \$filter = null, int \$limit = 100" : 'int $limit = 100';
    $allListArgs = $filter !== null ? '$page, $limit, $filter' : '$page, $limit';
    $filterDoc = $filter !== null ? "     * @param {$filter}|null \$filter Typed query filters.\n     *\n" : '';

    $methods = <<<PHP
            /**
             * Fetch a single page of results.
             *
        {$filterDoc}     * @return {$coll}
             */
            public function list({$listSignature}): {$coll}
            {
                return \$this->getListing({$coll}::class, self::PATH, {$listQuery});
            }

            /**
             * Iterate lazily over every item across all pages.
             *
             * @return Paginator<{$model}>
             */
            public function all({$allSignature}): Paginator
            {
                /** @var Paginator<{$model}> \$paginator */
                \$paginator = new Paginator(fn (int \$page): {$coll} => \$this->list({$allListArgs}));

                return \$paginator;
            }
        PHP;

    $methods .= capabilityMethods($resource['caps'], $model, $var);
    $methods .= $extras;

    return <<<PHP
        <?php

        declare(strict_types=1);

        namespace GoSuccess\\Easybill\\Resource;

        {$useStatements}

        /**
         * Access to the `/{$path}` endpoints.
         */
        final class {$name}Resource extends AbstractResource
        {
            private const string PATH = '{$path}';

        {$methods}
        }

        PHP;
}

/**
 * @param list<string> $caps
 */
function capabilityMethods(array $caps, string $model, string $var): string
{
    $out = '';

    if (in_array('get', $caps, true)) {
        $out .= "\n\n    public function get(int \$id): {$model}\n    {\n        return \$this->getModel({$model}::class, self::PATH . \"/{\$id}\");\n    }";
    }

    if (in_array('create', $caps, true)) {
        $out .= "\n\n    public function create({$model} \${$var}): {$model}\n    {\n        return \$this->createModel({$model}::class, self::PATH, \${$var});\n    }";
    }

    if (in_array('update', $caps, true)) {
        $out .= "\n\n    public function update(int \$id, {$model} \${$var}): {$model}\n    {\n        return \$this->updateModel({$model}::class, self::PATH . \"/{\$id}\", \${$var});\n    }";
    }

    if (in_array('delete', $caps, true)) {
        $out .= "\n\n    public function delete(int \$id): void\n    {\n        \$this->deleteResource(self::PATH . \"/{\$id}\");\n    }";
    }

    return $out;
}

function extraTransferSepaMandate(): string
{
    return "\n\n    /**\n     * Transfer the SEPA mandate of a customer to another payment provider.\n     */\n    public function transferSepaMandate(int \$id): Customer\n    {\n        return \$this->action(Customer::class, Method::Post, self::PATH . \"/{\$id}/sepa-mandate/transfer\");\n    }";
}

function extraAttachmentContent(): string
{
    return "\n\n    /**\n     * Download the raw binary content of an attachment.\n     */\n    public function content(int \$id): string\n    {\n        return \$this->download(self::PATH . \"/{\$id}/content\");\n    }";
}
