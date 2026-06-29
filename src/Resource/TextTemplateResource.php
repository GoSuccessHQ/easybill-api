<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\TextTemplate;
use GoSuccess\Easybill\Model\TextTemplates;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/text-templates` endpoints.
 */
final class TextTemplateResource extends AbstractResource
{
    private const string PATH = 'text-templates';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): TextTemplates
    {
        return $this->getListing(TextTemplates::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<TextTemplate>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<TextTemplate> $paginator */
        $paginator = new Paginator(fn(int $page): TextTemplates => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): TextTemplate
    {
        return $this->getModel(TextTemplate::class, self::PATH . "/{$id}");
    }

    public function create(TextTemplate $textTemplate): TextTemplate
    {
        return $this->createModel(TextTemplate::class, self::PATH, $textTemplate);
    }

    public function update(int $id, TextTemplate $textTemplate): TextTemplate
    {
        return $this->updateModel(TextTemplate::class, self::PATH . "/{$id}", $textTemplate);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
