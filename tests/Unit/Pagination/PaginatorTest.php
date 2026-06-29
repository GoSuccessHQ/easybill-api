<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Pagination;

use GoSuccess\Easybill\Model\Customer;
use GoSuccess\Easybill\Model\Customers;
use GoSuccess\Easybill\Pagination\Paginator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Paginator::class)]
final class PaginatorTest extends TestCase
{
    public function testIteratesAcrossAllPages(): void
    {
        $pages = [
            1 => new Customers(page: 1, pages: 2, limit: 2, total: 3, items: [
                new Customer(id: 1),
                new Customer(id: 2),
            ]),
            2 => new Customers(page: 2, pages: 2, limit: 2, total: 3, items: [
                new Customer(id: 3),
            ]),
        ];

        $fetched = [];

        /** @var Paginator<Customer> $paginator */
        $paginator = new Paginator(function (int $page) use ($pages, &$fetched): Customers {
            $fetched[] = $page;

            return $pages[$page];
        });

        $ids = [];

        foreach ($paginator as $customer) {
            $ids[] = $customer->id;
        }

        self::assertSame([1, 2, 3], $ids);
        self::assertSame([1, 2], $fetched);
    }
}
