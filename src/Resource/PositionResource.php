<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Position;
use GoSuccess\Easybill\Model\Positions;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/positions` endpoints.
 */
final class PositionResource extends AbstractResource
{
    private const string PATH = 'positions';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Positions
    {
        return $this->getListing(Positions::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Position>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Position> $paginator */
        $paginator = new Paginator(fn(int $page): Positions => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Position
    {
        return $this->getModel(Position::class, self::PATH . "/{$id}");
    }

    public function create(Position $position): Position
    {
        return $this->createModel(Position::class, self::PATH, $position);
    }

    public function update(int $id, Position $position): Position
    {
        return $this->updateModel(Position::class, self::PATH . "/{$id}", $position);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
