<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Pagination;

use Closure;
use Generator;
use GoSuccess\Easybill\Model\Listing;
use GoSuccess\Easybill\Model\Model;
use IteratorAggregate;
use Traversable;

/**
 * Lazily iterates over every item across all pages of a list endpoint.
 *
 * Pages are fetched on demand as the iteration proceeds, so each request is
 * subject to the configured rate limit.
 *
 * @template TItem of Model
 *
 * @implements IteratorAggregate<int, TItem>
 */
final class Paginator implements IteratorAggregate
{
    /**
     * @param Closure(int): Listing $fetchPage Fetches the given (1-based) page.
     */
    public function __construct(private readonly Closure $fetchPage) {}

    /**
     * @return Generator<int, TItem>
     */
    public function getIterator(): Traversable
    {
        $page = 1;

        do {
            $listing = ($this->fetchPage)($page);

            foreach ($listing->items as $item) {
                /** @var TItem $item */
                yield $item;
            }

            ++$page;
        } while ($page <= $listing->pages);
    }
}
