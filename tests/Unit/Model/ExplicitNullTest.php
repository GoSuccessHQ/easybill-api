<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Model;

use GoSuccess\Easybill\Model\Customer;
use GoSuccess\Easybill\Model\Document;
use GoSuccess\Easybill\Model\Undefined;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

/**
 * A payload must distinguish "leave this field alone" from "clear this field".
 *
 * @see Undefined
 */
#[CoversClass(Customer::class)]
#[CoversClass(Document::class)]
final class ExplicitNullTest extends TestCase
{
    public function testOmittedFieldsStayOutOfThePayload(): void
    {
        $payload = new Customer(companyName: 'ACME GmbH')->toArray();

        self::assertSame(['company_name' => 'ACME GmbH'], $payload);
    }

    public function testExplicitNullIsSerialized(): void
    {
        $payload = new Customer(note: null)->toArray();

        self::assertArrayHasKey('note', $payload);
        self::assertNull($payload['note']);
    }

    public function testExplicitEmptyListIsSerialized(): void
    {
        $payload = new Customer(emails: [])->toArray();

        self::assertSame(['emails' => []], $payload);
    }

    public function testExplicitNullClearsAnEnumField(): void
    {
        $payload = new Customer(salutation: null)->toArray();

        self::assertArrayHasKey('salutation', $payload);
        self::assertNull($payload['salutation']);
    }

    public function testExplicitNullClearsANestedModel(): void
    {
        $payload = new Document(recurringOptions: null)->toArray();

        self::assertArrayHasKey('recurring_options', $payload);
        self::assertNull($payload['recurring_options']);
    }

    public function testTheSentinelIsEquivalentToOmittingTheArgument(): void
    {
        $payload = new Customer(companyName: 'ACME GmbH', note: Undefined::Value)->toArray();

        self::assertSame(['company_name' => 'ACME GmbH'], $payload);
    }

    /**
     * A response carries no intent to clear anything, so a model that was read
     * from the API must not null out fields when it is sent back.
     */
    public function testRoundTrippedModelsDoNotClearFields(): void
    {
        $customer = Customer::fromArray([
            'id' => 42,
            'company_name' => 'ACME GmbH',
            'note' => null,
            'emails' => [],
        ]);

        self::assertNull($customer->note);
        self::assertSame([], $customer->emails);
        self::assertSame(['company_name' => 'ACME GmbH'], $customer->toArray());
    }
}
