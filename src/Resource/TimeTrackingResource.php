<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\TimeTrackingFilter;
use GoSuccess\Easybill\Model\TimeTracking;
use GoSuccess\Easybill\Model\TimeTrackings;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/time-trackings` endpoints.
 */
final class TimeTrackingResource extends AbstractResource
{
    private const string PATH = 'time-trackings';

    /**
     * Fetch a single page of results.
     *
     * @param TimeTrackingFilter|null $filter Typed query filters.
     *
     * @return TimeTrackings
     */
    public function list(int $page = 1, int $limit = 100, ?TimeTrackingFilter $filter = null): TimeTrackings
    {
        return $this->getListing(TimeTrackings::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<TimeTracking>
     */
    public function all(?TimeTrackingFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<TimeTracking> $paginator */
        $paginator = new Paginator(fn(int $page): TimeTrackings => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): TimeTracking
    {
        return $this->getModel(TimeTracking::class, self::PATH . "/{$id}");
    }

    public function create(TimeTracking $timeTracking): TimeTracking
    {
        return $this->createModel(TimeTracking::class, self::PATH, $timeTracking);
    }

    public function update(int $id, TimeTracking $timeTracking): TimeTracking
    {
        return $this->updateModel(TimeTracking::class, self::PATH . "/{$id}", $timeTracking);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
