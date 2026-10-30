<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Resource;

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;
use GoSuccess\Easybill\Http\Response;
use GoSuccess\Easybill\Resource\DocumentResource;
use GoSuccess\Easybill\Tests\Support\MockHttpClient;
use GoSuccess\Easybill\Tests\Support\SpyRateLimiter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DocumentResource::class)]
final class DocumentResourceTest extends TestCase
{
    /**
     * easybill answers `Accept: application/octet-stream` with 406 and serves the
     * configured e-invoice (a ZUGFeRD PDF with embedded XML) for `application/pdf`
     * (measured 2026-10-30).
     */
    public function testDownloadFileAsksForAPdfByDefault(): void
    {
        $http = new MockHttpClient(new Response(200, '%PDF-1.7'));
        $client = new Client(new ClientConfig(token: 'secret'), $http, new SpyRateLimiter());

        self::assertSame('%PDF-1.7', $client->documents->downloadFile(42));
        self::assertStringEndsWith('/documents/42/download', $http->requests[0]->uri);
        self::assertSame('application/pdf', $http->requests[0]->headers['Accept']);
    }

    public function testDownloadFileTakesAnotherFormat(): void
    {
        $http = new MockHttpClient(new Response(200, '<Invoice/>'));
        $client = new Client(new ClientConfig(token: 'secret'), $http, new SpyRateLimiter());

        $client->documents->downloadFile(42, 'application/xml;format=xrechnung');

        self::assertSame('application/xml;format=xrechnung', $http->requests[0]->headers['Accept']);
    }
}
