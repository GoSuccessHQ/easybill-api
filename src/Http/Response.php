<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Http;

/**
 * Immutable HTTP response value object returned by the {@see HttpClient} abstraction.
 */
final readonly class Response
{
    /**
     * @param array<string, string> $headers Map of lower-cased header name => combined value.
     */
    public function __construct(
        public int $statusCode,
        public string $body = '',
        public array $headers = [],
        public string $reasonPhrase = '',
    ) {}

    /**
     * Return a single header value (case-insensitive), or an empty string if absent.
     */
    public function header(string $name): string
    {
        return $this->headers[strtolower($name)] ?? '';
    }
}
