<?php

declare(strict_types=1);

/**
 * Custom transport: route requests through your own HTTP stack (e.g. Guzzle)
 * by implementing the HttpClient interface — the library has no HTTP dependency.
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;
use GoSuccess\Easybill\Http\HttpClient;
use GoSuccess\Easybill\Http\Request;
use GoSuccess\Easybill\Http\Response;

require __DIR__ . '/../vendor/autoload.php';

final class GuzzleTransport implements HttpClient
{
    public function send(Request $request): Response
    {
        // Translate the library's Request into your client's call and back into a
        // Response. Pseudocode with Guzzle:
        //
        // $psr = $guzzle->request($request->method->value, $request->uri, [
        //     'headers' => $request->headers,
        //     'body' => $request->body,
        //     'http_errors' => false,
        // ]);
        // return new Response(
        //     statusCode: $psr->getStatusCode(),
        //     body: (string) $psr->getBody(),
        //     headers: array_map(static fn (array $v): string => implode(', ', $v), $psr->getHeaders()),
        // );

        return new Response(statusCode: 200, body: '{}');
    }
}

$client = new Client(
    config: new ClientConfig(token: (string) getenv('EASYBILL_API_TOKEN')),
    httpClient: new GuzzleTransport(),
);

echo "Client is using a custom transport.\n";
