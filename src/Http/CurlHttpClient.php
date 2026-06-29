<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Http;

use CurlHandle;
use GoSuccess\Easybill\Exception\TransportException;

/**
 * Default {@see HttpClient} implementation built on PHP's cURL extension.
 *
 * Has no Composer dependencies; only requires `ext-curl`.
 */
final class CurlHttpClient implements HttpClient
{
    /**
     * Reused across requests so cURL keeps the TLS/TCP connection alive.
     */
    private ?CurlHandle $handle = null;

    /**
     * @param float $timeout        Maximum duration of the whole request in seconds.
     * @param float $connectTimeout Maximum duration of the connection phase in seconds.
     */
    public function __construct(
        private readonly float $timeout = 30.0,
        private readonly float $connectTimeout = 10.0,
    ) {}

    public function __destruct()
    {
        if ($this->handle !== null) {
            curl_close($this->handle);
        }
    }

    public function send(Request $request): Response
    {
        $handle = $this->handle ??= curl_init();
        curl_reset($handle);

        return $this->execute($handle, $request);
    }

    private function execute(CurlHandle $handle, Request $request): Response
    {
        /** @var array<string, string> $responseHeaders */
        $responseHeaders = [];

        curl_setopt_array($handle, [
            \CURLOPT_URL => $request->uri,
            \CURLOPT_CUSTOMREQUEST => $request->method->value,
            \CURLOPT_RETURNTRANSFER => true,
            \CURLOPT_FOLLOWLOCATION => false,
            \CURLOPT_HTTPHEADER => $this->formatHeaders($request->headers),
            \CURLOPT_TIMEOUT_MS => $this->milliseconds($this->timeout),
            \CURLOPT_CONNECTTIMEOUT_MS => $this->milliseconds($this->connectTimeout),
            \CURLOPT_HEADERFUNCTION => function (CurlHandle $_handle, string $line) use (&$responseHeaders): int {
                $length = \strlen($line);
                $parts = explode(':', $line, 2);

                if (\count($parts) === 2) {
                    $responseHeaders[strtolower(trim($parts[0]))] = trim($parts[1]);
                }

                return $length;
            },
        ]);

        if ($request->body !== null) {
            curl_setopt($handle, \CURLOPT_POSTFIELDS, $request->body);
        }

        $body = curl_exec($handle);

        if ($body === false) {
            $error = curl_error($handle);

            throw new TransportException(
                "cURL error while requesting {$request->uri}: {$error}",
                curl_errno($handle),
            );
        }

        /** @var int $status */
        $status = curl_getinfo($handle, \CURLINFO_RESPONSE_CODE);

        return new Response(
            statusCode: $status,
            body: \is_string($body) ? $body : '',
            headers: $responseHeaders,
        );
    }

    /**
     * Convert a seconds timeout to whole milliseconds for cURL.
     *
     * A non-positive value means "no timeout" (cURL's default). A small positive
     * value is rounded up to at least 1ms so it never collapses to 0 ("no timeout").
     */
    private function milliseconds(float $seconds): int
    {
        if ($seconds <= 0.0) {
            return 0;
        }

        return max(1, (int) round($seconds * 1000));
    }

    /**
     * @param array<string, string> $headers
     *
     * @return list<string>
     */
    private function formatHeaders(array $headers): array
    {
        $formatted = [];

        foreach ($headers as $name => $value) {
            $formatted[] = $name . ': ' . $value;
        }

        return $formatted;
    }
}
