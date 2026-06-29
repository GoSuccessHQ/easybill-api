<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Model;

/**
 * A paginated collection response.
 *
 * Every list endpoint returns the current page of results together with the
 * pagination metadata exposed by these virtual properties.
 */
interface Listing extends Model
{
    /** The current page (1-based). */
    public int $page { get; }

    /** The total number of available pages. */
    public int $pages { get; }

    /** The page size used for this response. */
    public int $limit { get; }

    /** The total number of items across all pages. */
    public int $total { get; }

    /**
     * The items on the current page.
     *
     * @var list<Model>
     */
    public array $items { get; }
}
