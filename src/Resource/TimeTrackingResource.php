<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

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
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): TimeTrackings
    {
        return $this->getListing(TimeTrackings::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<TimeTracking>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<TimeTracking> $paginator */
        $paginator = new Paginator(fn(int $page): TimeTrackings => $this->list($page, $limit, $filters));

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
