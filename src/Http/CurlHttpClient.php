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
     * @param float $timeout        Maximum duration of the whole request in seconds.
     * @param float $connectTimeout Maximum duration of the connection phase in seconds.
     */
    public function __construct(
        private readonly float $timeout = 30.0,
        private readonly float $connectTimeout = 10.0,
    ) {}

    public function send(Request $request): Response
    {
        $handle = curl_init();

        try {
            return $this->execute($handle, $request);
        } finally {
            curl_close($handle);
        }
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
            \CURLOPT_TIMEOUT_MS => (int) ($this->timeout * 1000),
            \CURLOPT_CONNECTTIMEOUT_MS => (int) ($this->connectTimeout * 1000),
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
