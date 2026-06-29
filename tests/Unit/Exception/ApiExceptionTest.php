<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Unit\Exception;

use GoSuccess\Easybill\Exception\ApiException;
use GoSuccess\Easybill\Exception\RateLimitException;
use GoSuccess\Easybill\Exception\ValidationException;
use GoSuccess\Easybill\Http\Response;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ApiException::class)]
#[CoversClass(RateLimitException::class)]
final class ApiExceptionTest extends TestCase
{
    public function testBuildsValidationExceptionWithDetailMessage(): void
    {
        $exception = ApiException::fromResponse(new Response(422, '{"message":"name is required"}'));

        self::assertInstanceOf(ValidationException::class, $exception);
        self::assertSame(422, $exception->statusCode);
        self::assertStringContainsString('name is required', $exception->getMessage());
    }

    public function testBuildsRateLimitExceptionWithRetryAfter(): void
    {
        $exception = ApiException::fromResponse(new Response(429, '', ['retry-after' => '30']));

        self::assertInstanceOf(RateLimitException::class, $exception);
        self::assertSame(30, $exception->retryAfter);
    }

    public function testFallsBackToGenericApiExceptionForUnknownStatus(): void
    {
        $exception = ApiException::fromResponse(new Response(500, 'Internal Server Error'));

        self::assertSame(ApiException::class, $exception::class);
        self::assertSame(500, $exception->statusCode);
    }

    public function testParsesNumericRetryAfter(): void
    {
        self::assertSame(45, RateLimitException::parseRetryAfter('45'));
    }

    public function testParsesEmptyRetryAfterAsNull(): void
    {
        self::assertNull(RateLimitException::parseRetryAfter(''));
    }
}
