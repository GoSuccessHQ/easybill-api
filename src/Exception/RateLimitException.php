<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Exception;

/**
 * Thrown when the easybill API rejects a request because the rate limit has been
 * exceeded (HTTP 429).
 *
 * With the built-in {@see \GoSuccess\Easybill\RateLimit\SlidingWindowRateLimiter}
 * configured to your account's limit this should not normally happen. If it does,
 * {@see $retryAfter} holds the number of seconds to wait before retrying, when the
 * API provides a `Retry-After` header.
 */
final class RateLimitException extends ApiException
{
    public function __construct(
        string $message,
        int $statusCode,
        string $responseBody = '',
        public readonly ?int $retryAfter = null,
    ) {
        parent::__construct($message, $statusCode, $responseBody);
    }

    /**
     * Parse a `Retry-After` header value into seconds.
     *
     * Supports both the delay-seconds form (e.g. "30") and the HTTP-date form
     * (e.g. "Wed, 21 Oct 2026 07:28:00 GMT"). Returns null if the value is empty
     * or cannot be interpreted.
     */
    public static function parseRetryAfter(string $headerValue): ?int
    {
        $value = trim($headerValue);

        if ($value === '') {
            return null;
        }

        if (ctype_digit($value)) {
            return (int) $value;
        }

        $timestamp = strtotime($value);

        if ($timestamp === false) {
            return null;
        }

        $seconds = $timestamp - time();

        return $seconds > 0 ? $seconds : 0;
    }
}
