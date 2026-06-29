<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Filter\SerialNumberFilter;
use GoSuccess\Easybill\Model\SerialNumber;
use GoSuccess\Easybill\Model\SerialNumbers;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/serial-numbers` endpoints.
 */
final class SerialNumberResource extends AbstractResource
{
    private const string PATH = 'serial-numbers';

    /**
     * Fetch a single page of results.
     *
     * @param SerialNumberFilter|null $filter Typed query filters.
     *
     * @return SerialNumbers
     */
    public function list(int $page = 1, int $limit = 100, ?SerialNumberFilter $filter = null): SerialNumbers
    {
        return $this->getListing(SerialNumbers::class, self::PATH, ['page' => $page, 'limit' => $limit, ...($filter?->toQuery() ?? [])]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @return Paginator<SerialNumber>
     */
    public function all(?SerialNumberFilter $filter = null, int $limit = 100): Paginator
    {
        /** @var Paginator<SerialNumber> $paginator */
        $paginator = new Paginator(fn(int $page): SerialNumbers => $this->list($page, $limit, $filter));

        return $paginator;
    }

    public function get(int $id): SerialNumber
    {
        return $this->getModel(SerialNumber::class, self::PATH . "/{$id}");
    }

    public function create(SerialNumber $serialNumber): SerialNumber
    {
        return $this->createModel(SerialNumber::class, self::PATH, $serialNumber);
    }

    public function delete(int $id): void
    {
        $this->deleteResource(self::PATH . "/{$id}");
    }
}
