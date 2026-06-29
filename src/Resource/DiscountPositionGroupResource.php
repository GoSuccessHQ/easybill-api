<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\DiscountPositionGroupFilter;
use GoSuccess\Easybill\Model\DiscountPositionGroup;
use GoSuccess\Easybill\Model\DiscountPositionGroups;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/discounts/position-group` endpoints.
 */
final class DiscountPositionGroupResource extends AbstractResource
{
    private const string PATH = 'discounts/position-group';

    /**
     * Fetch a single page of results.
     *
     * @param DiscountPositionGroupFilter|null $filter Typed query filters.
     *
     * @return DiscountPositionGroups
     */
    public function list(int $page = 1, int $limit = 100, ?DiscountPositionGroupFilter $filter = null): DiscountPositionGroups
    {
        return $this->getListing(DiscountPositionGroups::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<DiscountPositionGroup>
     */
    public function all(?DiscountPositionGroupFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<DiscountPositionGroup> $paginator */
        $paginator = new Paginator(fn(int $page): DiscountPositionGroups => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): DiscountPositionGroup
    {
        return $this->getModel(DiscountPositionGroup::class, self::PATH . "/{$id}");
    }

    public function create(DiscountPositionGroup $discountPositionGroup): DiscountPositionGroup
    {
        return $this->createModel(DiscountPositionGroup::class, self::PATH, $discountPositionGroup);
    }

    public function update(int $id, DiscountPositionGroup $discountPositionGroup): DiscountPositionGroup
    {
        return $this->updateModel(DiscountPositionGroup::class, self::PATH . "/{$id}", $discountPositionGroup);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
