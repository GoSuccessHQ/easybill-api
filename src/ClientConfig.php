<?php

declare(strict_types=1);

namespace GoSuccess\Easybill;

use InvalidArgumentException;

/**
 * Immutable configuration for the {@see Client}.
 */
final class ClientConfig
{
    public const string DEFAULT_BASE_URI = 'https://api.easybill.de/rest/v1';
    public const string DEFAULT_USER_AGENT = 'gosuccess/easybill-api (+https://github.com/gosuccess/easybill-api)';

    /**
     * The configured base URI, guaranteed to be free of a trailing slash.
     */
    public string $normalizedBaseUri {
        get => rtrim($this->baseUri, '/');
    }

    /**
     * @param string $token             The easybill API key (sent as `Bearer <token>`).
     * @param int    $requestsPerMinute Maximum requests per minute. easybill currently allows 10 or 60
     *                                  depending on the plan; set this to match YOUR limit so the client
     *                                  throttles proactively and never hits a 429.
     * @param string $baseUri           Base URI of the API (without a trailing slash).
     * @param int    $maxRetries        How often a failed request (429, 5xx, network error) is retried.
     *                                  Only idempotent requests (GET, PUT, DELETE) are retried on 5xx
     *                                  and transport errors; a 429 is always retried.
     * @param float  $retryBaseDelay    Base delay in seconds for exponential backoff between retries.
     * @param float  $maxRetryDelay     Upper bound in seconds for any single retry wait (also caps a
     *                                  server-provided `Retry-After`).
     * @param string $userAgent         Value of the User-Agent header.
     * @param float  $timeout           Maximum duration of a whole request in seconds (default transport).
     * @param float  $connectTimeout    Maximum duration of the connection phase in seconds (default transport).
     */
    public function __construct(
        public readonly string $token,
        public readonly int $requestsPerMinute = 60,
        public readonly string $baseUri = self::DEFAULT_BASE_URI,
        public readonly int $maxRetries = 3,
        public readonly float $retryBaseDelay = 1.0,
        public readonly float $maxRetryDelay = 300.0,
        public readonly string $userAgent = self::DEFAULT_USER_AGENT,
        public readonly float $timeout = 30.0,
        public readonly float $connectTimeout = 10.0,
    ) {
        if (trim($token) === '') {
            throw new InvalidArgumentException('The API token must not be empty.');
        }

        if ($requestsPerMinute < 1) {
            throw new InvalidArgumentException('requestsPerMinute must be at least 1.');
        }

        if ($baseUri === '') {
            throw new InvalidArgumentException('baseUri must not be empty.');
        }

        if ($maxRetries < 0) {
            throw new InvalidArgumentException('maxRetries must not be negative.');
        }

        if ($retryBaseDelay < 0.0) {
            throw new InvalidArgumentException('retryBaseDelay must not be negative.');
        }

        if ($maxRetryDelay < 0.0) {
            throw new InvalidArgumentException('maxRetryDelay must not be negative.');
        }
    }
}
