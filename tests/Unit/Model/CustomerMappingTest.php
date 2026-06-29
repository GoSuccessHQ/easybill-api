<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Model;

use GoSuccess\Easybill\Enum\CashDiscountType;
use GoSuccess\Easybill\Enum\Salutation;
use GoSuccess\Easybill\Model\Customer;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Customer::class)]
final class CustomerMappingTest extends TestCase
{
    public function testMapsScalarsEnumsAndLists(): void
    {
        $customer = Customer::fromArray([
            'id' => 42,
            'company_name' => 'ACME GmbH',
            'salutation' => 1,
            'cash_discount_type' => 'PERCENT',
            'emails' => ['a@example.com', 'b@example.com'],
            'additional_groups_ids' => [1, 2, 3],
            'created_at' => '2026-01-01 10:00:00',
        ]);

        self::assertSame(42, $customer->id);
        self::assertSame('ACME GmbH', $customer->companyName);
        self::assertSame(Salutation::Mr, $customer->salutation);
        self::assertSame(CashDiscountType::Percent, $customer->cashDiscountType);
        self::assertSame(['a@example.com', 'b@example.com'], $customer->emails);
        self::assertSame([1, 2, 3], $customer->additionalGroupsIds);
    }

    public function testUnknownEnumValueBecomesNull(): void
    {
        $customer = Customer::fromArray(['salutation' => 99]);

        self::assertNull($customer->salutation);
    }

    public function testToArrayOmitsReadOnlyAndNullFields(): void
    {
        $customer = Customer::fromArray([
            'id' => 42,
            'company_name' => 'ACME GmbH',
            'salutation' => 1,
            'created_at' => '2026-01-01 10:00:00',
            'display_name' => 'ACME GmbH',
        ]);

        $payload = $customer->toArray();

        self::assertSame('ACME GmbH', $payload['company_name']);
        self::assertSame(1, $payload['salutation']);
        self::assertArrayNotHasKey('id', $payload);
        self::assertArrayNotHasKey('created_at', $payload);
        self::assertArrayNotHasKey('display_name', $payload);
        self::assertArrayNotHasKey('last_name', $payload);
    }
}
