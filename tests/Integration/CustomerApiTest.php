<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Integration;

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

/**
 * Hits the real easybill API. Skipped unless the EASYBILL_API_TOKEN environment
 * variable is set.
 */
#[Group('integration')]
final class CustomerApiTest extends TestCase
{
    private string $token;

    protected function setUp(): void
    {
        $token = getenv('EASYBILL_API_TOKEN');

        if (!\is_string($token) || $token === '') {
            self::markTestSkipped('EASYBILL_API_TOKEN is not set.');
        }

        $this->token = $token;
    }

    public function testListsCustomers(): void
    {
        $client = new Client(new ClientConfig(token: $this->token, requestsPerMinute: 10));

        $customers = $client->customers->list(limit: 1);

        self::assertGreaterThanOrEqual(0, $customers->total);
        self::assertLessThanOrEqual(1, \count($customers->items));
    }
}
