<?php

declare(strict_types=1);

/**
 * Pagination: a single page vs. lazily iterating over all pages.
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\CustomerFilter;

/** @var Client $client */
$client = require __DIR__ . '/bootstrap.php';

// A single page
$page = $client->customers->list(page: 1, limit: 50, filter: new CustomerFilter(country: 'DE'));
printf("Page %d of %d — %d customers total\n", $page->page, $page->pages, $page->total);

// All customers across every page (each request is rate-limited automatically)
$count = 0;

foreach ($client->customers->all(new CustomerFilter(country: 'DE')) as $customer) {
    ++$count;
}

printf("Iterated over %d customers\n", $count);
