<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\PositionGroup;
use GoSuccess\Easybill\Model\PositionGroups;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/position-groups` endpoints.
 */
final class PositionGroupResource extends AbstractResource
{
    private const string PATH = 'position-groups';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): PositionGroups
    {
        return $this->getListing(PositionGroups::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<PositionGroup>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<PositionGroup> $paginator */
        $paginator = new Paginator(fn(int $page): PositionGroups => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): PositionGroup
    {
        return $this->getModel(PositionGroup::class, self::PATH . "/{$id}");
    }

    public function create(PositionGroup $positionGroup): PositionGroup
    {
        return $this->createModel(PositionGroup::class, self::PATH, $positionGroup);
    }

    public function update(int $id, PositionGroup $positionGroup): PositionGroup
    {
        return $this->updateModel(PositionGroup::class, self::PATH . "/{$id}", $positionGroup);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
