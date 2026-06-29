<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\DiscountPositionFilter;
use GoSuccess\Easybill\Model\DiscountPosition;
use GoSuccess\Easybill\Model\DiscountPositions;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/discounts/position` endpoints.
 */
final class DiscountPositionResource extends AbstractResource
{
    private const string PATH = 'discounts/position';

    /**
     * Fetch a single page of results.
     *
     * @param DiscountPositionFilter|null $filter Typed query filters.
     *
     * @return DiscountPositions
     */
    public function list(int $page = 1, int $limit = 100, ?DiscountPositionFilter $filter = null): DiscountPositions
    {
        return $this->getListing(DiscountPositions::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<DiscountPosition>
     */
    public function all(?DiscountPositionFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<DiscountPosition> $paginator */
        $paginator = new Paginator(fn(int $page): DiscountPositions => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): DiscountPosition
    {
        return $this->getModel(DiscountPosition::class, self::PATH . "/{$id}");
    }

    public function create(DiscountPosition $discountPosition): DiscountPosition
    {
        return $this->createModel(DiscountPosition::class, self::PATH, $discountPosition);
    }

    public function update(int $id, DiscountPosition $discountPosition): DiscountPosition
    {
        return $this->updateModel(DiscountPosition::class, self::PATH . "/{$id}", $discountPosition);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
