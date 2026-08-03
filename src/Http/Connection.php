<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Http;

use GoSuccess\Easybill\ClientConfig;
use GoSuccess\Easybill\Exception\ApiException;
use GoSuccess\Easybill\Exception\RateLimitException;
use GoSuccess\Easybill\Exception\SerializationException;
use GoSuccess\Easybill\Exception\TransportException;
use GoSuccess\Easybill\RateLimit\Clock;
use GoSuccess\Easybill\RateLimit\RateLimiter;
use GoSuccess\Easybill\RateLimit\SystemClock;
use JsonException;

/**
 * Mid-level HTTP layer: builds requests, sends them through the {@see HttpClient},
 * enforces the rate limit, retries transient failures and maps error responses to
 * typed exceptions.
 */
final class Connection
{
    public function __construct(
        private readonly ClientConfig $config,
        private readonly HttpClient $httpClient,
        private readonly RateLimiter $rateLimiter,
        private readonly Clock $clock = new SystemClock(),
    ) {}

    /**
     * Perform a request and decode the JSON response body into an array.
     *
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     * @param array<string, mixed>|null                            $body
     *
     * @return array<string, mixed> The decoded response, or an empty array for `204 No Content`.
     */
    public function requestJson(Method $method, string $path, array $query = [], ?array $body = null): array
    {
        $response = $this->send($method, $path, $query, $this->encodeBody($body), $body !== null);

        return $this->decodeJson($response);
    }

    /**
     * Perform a request and return the raw response body (e.g. for binary downloads).
     *
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     */
    public function requestRaw(Method $method, string $path, array $query = [], string $accept = '*/*'): string
    {
        $response = $this->send($method, $path, $query, null, false, ['Accept' => $accept]);

        return $response->body;
    }

    /**
     * Send a request, applying rate limiting, retries and error mapping.
     *
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     * @param array<string, string>                                $extraHeaders
     *
     * @throws ApiException       On a non-retryable (or final) HTTP error response.
     * @throws TransportException On a transport-level failure that exhausted all retries.
     */
    public function send(
        Method $method,
        string $path,
        array $query = [],
        ?string $body = null,
        bool $hasJsonBody = false,
        array $extraHeaders = [],
    ): Response {
        $request = new Request(
            method: $method,
            uri: $this->buildUri($path, $query),
            headers: $this->buildHeaders($hasJsonBody, $extraHeaders),
            body: $body,
        );

        $attempt = 0;

        while (true) {
            $this->rateLimiter->acquire();

            try {
                $response = $this->httpClient->send($request);
            } catch (TransportException $e) {
                // A transport failure may have reached the server, so only retry
                // idempotent requests to avoid duplicating writes.
                if ($this->isIdempotent($method) && $attempt < $this->config->maxRetries) {
                    $this->clock->sleep($this->backoffDelay($attempt));
                    ++$attempt;

                    continue;
                }

                throw $e;
            }

            $status = $response->statusCode;

            if ($status >= 200 && $status < 400) {
                return $response;
            }

            if ($this->isRetryable($status, $method) && $attempt < $this->config->maxRetries) {
                $this->clock->sleep($this->retryDelay($status, $response, $attempt));
                ++$attempt;

                continue;
            }

            throw ApiException::fromResponse($response);
        }
    }

    /**
     * @param array<string, scalar|array<int|string, scalar>|null> $query
     *
     * @return non-empty-string
     */
    private function buildUri(string $path, array $query): string
    {
        $uri = "{$this->config->normalizedBaseUri}/" . ltrim($path, '/');
        $filtered = array_filter($query, static fn(mixed $value): bool => $value !== null);

        if ($filtered !== []) {
            $uri .= '?' . http_build_query($filtered, '', '&', \PHP_QUERY_RFC3986);
        }

        return $uri;
    }

    /**
     * @param array<string, string> $extraHeaders
     *
     * @return array<string, string>
     */
    private function buildHeaders(bool $hasJsonBody, array $extraHeaders): array
    {
        $headers = [
            'Authorization' => "Bearer {$this->config->token}",
            'Accept' => 'application/json',
            'User-Agent' => $this->config->userAgent,
        ];

        if ($hasJsonBody) {
            $headers['Content-Type'] = 'application/json';
        }

        return [...$headers, ...$extraHeaders];
    }

    /**
     * @param array<string, mixed>|null $body
     */
    private function encodeBody(?array $body): ?string
    {
        if ($body === null) {
            return null;
        }

        try {
            return json_encode($body, \JSON_THROW_ON_ERROR | \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE);
        } catch (JsonException $e) {
            throw new SerializationException("Failed to encode request body as JSON: {$e->getMessage()}", 0, $e);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function decodeJson(Response $response): array
    {
        if ($response->statusCode === 204) {
            return [];
        }

        $body = $response->body;

        if (trim($body) === '') {
            return [];
        }

        try {
            $decoded = json_decode($body, true, 512, \JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new SerializationException("Failed to decode JSON response: {$e->getMessage()}", 0, $e);
        }

        if (!\is_array($decoded)) {
            throw new SerializationException('Expected a JSON object or array in the response body.');
        }

        /** @var array<string, mixed> $decoded */
        return $decoded;
    }

    /**
     * A `429` is always safe to retry (the request was rejected, not processed).
     * A `5xx` may have been processed, so only retry it for idempotent methods.
     */
    private function isRetryable(int $status, Method $method): bool
    {
        if ($status === 429) {
            return true;
        }

        return $status >= 500 && $this->isIdempotent($method);
    }

    private function isIdempotent(Method $method): bool
    {
        return $method === Method::Get || $method === Method::Put || $method === Method::Delete;
    }

    private function retryDelay(int $status, Response $response, int $attempt): float
    {
        if ($status === 429) {
            $retryAfter = RateLimitException::parseRetryAfter($response->header('Retry-After'));

            if ($retryAfter !== null) {
                return $this->cap((float) $retryAfter);
            }
        }

        return $this->backoffDelay($attempt);
    }

    private function backoffDelay(int $attempt): float
    {
        return $this->cap($this->config->retryBaseDelay * (2 ** $attempt));
    }

    /**
     * Clamp a delay to the configured maximum, guarding against a hostile or
     * malformed `Retry-After` blocking the process for an excessive time.
     */
    private function cap(float $delay): float
    {
        return min($delay, $this->config->maxRetryDelay);
    }
}
