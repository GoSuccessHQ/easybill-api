<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Filter;

use GoSuccess\Easybill\Enum\DocumentType;
use GoSuccess\Easybill\Filter\DocumentFilter;
use GoSuccess\Easybill\Filter\PdfTemplateFilter;
use GoSuccess\Easybill\Filter\SerialNumberFilter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DocumentFilter::class)]
#[CoversClass(SerialNumberFilter::class)]
#[CoversClass(PdfTemplateFilter::class)]
final class FilterTest extends TestCase
{
    public function testSerializesEnumsBooleanFlagsAndScalars(): void
    {
        $filter = new DocumentFilter(
            type: DocumentType::Invoice,
            isDraft: true,
            isArchive: false,
            customerId: '42',
        );

        self::assertSame([
            'type' => 'INVOICE',
            'is_draft' => '1',
            'is_archive' => '0',
            'customer_id' => '42',
        ], $filter->toQuery());
    }

    public function testOmitsUnsetFilters(): void
    {
        self::assertSame(['in_use' => false], new SerialNumberFilter(inUse: false)->toQuery());
        self::assertSame([], new SerialNumberFilter()->toQuery());
    }

    public function testJoinsArrayFiltersAsCommaSeparatedValues(): void
    {
        $filter = new PdfTemplateFilter(type: ['INVOICE-DE', 'OFFER-DE']);

        self::assertSame(['type' => 'INVOICE-DE,OFFER-DE'], $filter->toQuery());
    }
}
