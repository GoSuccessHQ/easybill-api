<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\PostBox;
use GoSuccess\Easybill\Model\PostBoxes;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/post-boxes` endpoints.
 */
final class PostBoxResource extends AbstractResource
{
    private const string PATH = 'post-boxes';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): PostBoxes
    {
        return $this->getListing(PostBoxes::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<PostBox>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<PostBox> $paginator */
        $paginator = new Paginator(fn(int $page): PostBoxes => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): PostBox
    {
        return $this->getModel(PostBox::class, self::PATH . "/{$id}");
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
