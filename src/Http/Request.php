<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Http;

/**
 * Immutable HTTP request value object used by the {@see HttpClient} abstraction.
 */
final readonly class Request
{
    /**
     * @param array<string, string> $headers Map of header name => value.
     */
    public function __construct(
        public Method $method,
        public string $uri,
        public array $headers = [],
        public ?string $body = null,
    ) {}
}
