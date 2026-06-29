<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Model;

use GoSuccess\Easybill\Enum\DocumentType;
use GoSuccess\Easybill\Model\Document;
use GoSuccess\Easybill\Model\DocumentAddress;
use GoSuccess\Easybill\Model\DocumentPosition;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Document::class)]
#[CoversClass(DocumentAddress::class)]
#[CoversClass(DocumentPosition::class)]
final class DocumentMappingTest extends TestCase
{
    public function testMapsNestedModelAndListOfModels(): void
    {
        $document = Document::fromArray([
            'id' => 100,
            'type' => 'INVOICE',
            'address' => [
                'company_name' => 'ACME GmbH',
                'city' => 'Berlin',
            ],
            'items' => [
                ['description' => 'Item A', 'quantity' => 2],
                ['description' => 'Item B', 'quantity' => 1],
            ],
        ]);

        self::assertSame(DocumentType::Invoice, $document->type);
        self::assertInstanceOf(DocumentAddress::class, $document->address);
        self::assertSame('Berlin', $document->address->city);
        self::assertCount(2, $document->items);
        self::assertInstanceOf(DocumentPosition::class, $document->items[0]);
        self::assertSame('Item A', $document->items[0]->description);
    }

    public function testSerializesListsOfModelsAndOmitsReadOnlyNestedObjects(): void
    {
        $document = Document::fromArray([
            'type' => 'OFFER',
            // DocumentAddress is fully read-only in the spec, so it must not be serialized.
            'address' => ['company_name' => 'ACME GmbH'],
            'items' => [['description' => 'Item A']],
        ]);

        $payload = $document->toArray();

        self::assertSame('OFFER', $payload['type']);
        self::assertSame([['description' => 'Item A']], $payload['items']);
        self::assertArrayNotHasKey('address', $payload);
    }
}
