<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\PositionFilter;
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
     * @param PositionFilter|null $filter Typed query filters.
     *
     * @return Positions
     */
    public function list(int $page = 1, int $limit = 100, ?PositionFilter $filter = null): Positions
    {
        return $this->getListing(Positions::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<Position>
     */
    public function all(?PositionFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<Position> $paginator */
        $paginator = new Paginator(fn(int $page): Positions => $this->list($page, $limit, $filter));

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
