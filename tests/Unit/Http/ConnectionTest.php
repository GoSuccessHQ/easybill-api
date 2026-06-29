<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Http;

use GoSuccess\Easybill\ClientConfig;
use GoSuccess\Easybill\Exception\NotFoundException;
use GoSuccess\Easybill\Exception\TransportException;
use GoSuccess\Easybill\Http\Connection;
use GoSuccess\Easybill\Http\Method;
use GoSuccess\Easybill\Http\Response;
use GoSuccess\Easybill\Tests\Support\FakeClock;
use GoSuccess\Easybill\Tests\Support\MockHttpClient;
use GoSuccess\Easybill\Tests\Support\SpyRateLimiter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Connection::class)]
final class ConnectionTest extends TestCase
{
    public function testRetriesAfter429AndReturnsTheSuccessfulResponse(): void
    {
        $http = new MockHttpClient(
            new Response(429),
            new Response(200, '{"id":7}'),
        );
        $clock = new FakeClock();
        $rateLimiter = new SpyRateLimiter();
        $connection = new Connection($this->config(), $http, $rateLimiter, $clock);

        $result = $connection->requestJson(Method::Get, 'customers/7');

        self::assertSame(['id' => 7], $result);
        self::assertSame(2, $http->callCount());
        self::assertSame(2, $rateLimiter->acquireCount);
        self::assertSame([1.0], $clock->sleeps); // first backoff = retryBaseDelay * 2^0
    }

    public function testHonorsRetryAfterHeaderOn429(): void
    {
        $http = new MockHttpClient(
            new Response(429, '', ['retry-after' => '5']),
            new Response(200, '{}'),
        );
        $clock = new FakeClock();
        $connection = new Connection($this->config(), $http, new SpyRateLimiter(), $clock);

        $connection->requestJson(Method::Get, 'customers');

        self::assertSame([5.0], $clock->sleeps);
    }

    public function testMapsErrorStatusToTypedException(): void
    {
        $http = new MockHttpClient(new Response(404, '{"message":"not found"}'));
        $connection = new Connection($this->config(maxRetries: 0), $http, new SpyRateLimiter(), new FakeClock());

        $this->expectException(NotFoundException::class);

        $connection->requestJson(Method::Get, 'customers/999');
    }

    public function testRetriesTransportErrorsThenGivesUp(): void
    {
        $http = new MockHttpClient(
            new TransportException('boom'),
            new TransportException('boom'),
        );
        $clock = new FakeClock();
        $connection = new Connection($this->config(maxRetries: 1), $http, new SpyRateLimiter(), $clock);

        $this->expectException(TransportException::class);

        $connection->requestJson(Method::Get, 'customers');
    }

    public function testSendsAuthorizationAndJsonBody(): void
    {
        $http = new MockHttpClient(new Response(201, '{"id":1}'));
        $connection = new Connection($this->config(), $http, new SpyRateLimiter(), new FakeClock());

        $connection->requestJson(Method::Post, 'customers', body: ['company_name' => 'ACME']);

        $request = $http->requests[0];
        self::assertSame('Bearer secret', $request->headers['Authorization']);
        self::assertSame('application/json', $request->headers['Content-Type']);
        self::assertSame('{"company_name":"ACME"}', $request->body);
    }

    private function config(int $maxRetries = 3): ClientConfig
    {
        return new ClientConfig(token: 'secret', maxRetries: $maxRetries, retryBaseDelay: 1.0);
    }
}
