<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Resource;

use GoSuccess\Easybill\Model\Stock;
use GoSuccess\Easybill\Model\Stocks;
use GoSuccess\Easybill\Pagination\Paginator;

/**
 * Access to the `/stocks` endpoints.
 */
final class StockResource extends AbstractResource
{
    private const string PATH = 'stocks';

    /**
     * Fetch a single page of results.
     *
     * @param array<string, scalar|null> $filters
     */
    public function list(int $page = 1, int $limit = 100, array $filters = []): Stocks
    {
        return $this->getListing(Stocks::class, self::PATH, ['page' => $page, 'limit' => $limit, ...$filters]);
    }

    /**
     * Iterate lazily over every item across all pages.
     *
     * @param array<string, scalar|null> $filters
     *
     * @return Paginator<Stock>
     */
    public function all(array $filters = [], int $limit = 100): Paginator
    {
        /** @var Paginator<Stock> $paginator */
        $paginator = new Paginator(fn(int $page): Stocks => $this->list($page, $limit, $filters));

        return $paginator;
    }

    public function get(int $id): Stock
    {
        return $this->getModel(Stock::class, self::PATH . "/{$id}");
    }

    public function create(Stock $stock): Stock
    {
        return $this->createModel(Stock::class, self::PATH, $stock);
    }
}
