<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Model;

use GoSuccess\Easybill\Model\SEPAPayment;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(SEPAPayment::class)]
final class SepaPaymentMappingTest extends TestCase
{
    /**
     * The API always expected `debitor_address_line_2` (with underscore); the
     * swagger documentation wrongly spelled it `debitor_address_line2` until
     * API version 1.99.1.
     */
    public function testMapsBothDebitorAddressLinesWithUnderscoredKeys(): void
    {
        $payment = SEPAPayment::fromArray([
            'debitor_address_line_1' => 'Bahnhofstrasse 1',
            'debitor_address_line_2' => '8001 Zürich',
        ]);

        self::assertSame('Bahnhofstrasse 1', $payment->debitorAddressLine1);
        self::assertSame('8001 Zürich', $payment->debitorAddressLine2);

        $payload = $payment->toArray();

        self::assertSame('Bahnhofstrasse 1', $payload['debitor_address_line_1']);
        self::assertSame('8001 Zürich', $payload['debitor_address_line_2']);
        self::assertArrayNotHasKey('debitor_address_line2', $payload);
    }
}
