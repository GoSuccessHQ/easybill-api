<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Http;

use GoSuccess\Easybill\Exception\TransportException;

/**
 * Minimal HTTP transport abstraction.
 *
 * The library ships with {@see CurlHttpClient} (zero external dependencies). You
 * can provide your own implementation to route requests through an existing HTTP
 * stack (e.g. Guzzle) without the library depending on it.
 */
interface HttpClient
{
    /**
     * Send a request and return the response.
     *
     * Implementations MUST throw a {@see TransportException} for transport-level
     * failures (connection errors, timeouts, …) — they must NOT throw for HTTP
     * error status codes, which are returned as a normal {@see Response}.
     *
     * @throws TransportException
     */
    public function send(Request $request): Response;
}
