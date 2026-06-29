# easybill API – PHP Client

A modern, strongly-typed PHP client for the [easybill REST API](https://api.easybill.de/rest/v1/swagger.json),
built for **PHP 8.4+** with first-class **rate-limit handling**.

> [!WARNING]
> This library is under active development and not yet stable.

## Features

- **PHP 8.4+**, fully typed `final readonly` DTOs and native enums.
- **PSR-18 / PSR-17** based — bring your own HTTP client (Guzzle, Symfony HttpClient, …)
  via [`php-http/discovery`](https://github.com/php-http/discovery), no hard dependency.
- **Built-in rate limiting.** easybill currently allows 10 or 60 requests/minute and does not
  reliably advertise the limit in response headers. The client therefore throttles requests
  **proactively** and the limit is **freely configurable**.
- Automatic retry with exponential backoff on `429` / transient errors, honoring `Retry-After`
  when the API provides it.
- Typed exception hierarchy for every documented HTTP error.
- Lazy pagination over all result pages.

## Requirements

- PHP **8.4** or higher (the `dom`, `xml` and `mbstring` extensions are only needed for running
  the test suite).
- A PSR-18 HTTP client and PSR-17 factories (auto-discovered).

## Installation

```bash
composer require gosuccess/easybill-api
```

If you do not already have a PSR-18 client installed, add one, e.g.:

```bash
composer require guzzlehttp/guzzle
```

## Quick start

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;

$client = new Client(new ClientConfig(
    token: 'your-api-key',
    // easybill allows 10 or 60 requests/minute depending on your plan.
    // Set this to match YOUR limit so the client never hits a 429:
    requestsPerMinute: 60,
));

// Fetch a single customer
$customer = $client->customers->get(12345);

// Iterate over ALL customers, page by page (rate-limited automatically)
foreach ($client->customers->all() as $customer) {
    echo $customer->companyName . PHP_EOL;
}
```

## Rate limiting

The request limit is configured via `ClientConfig::$requestsPerMinute`. The default
`SlidingWindowRateLimiter` keeps the client below that threshold so you avoid `429` responses
entirely. You can swap in your own implementation of the `RateLimiter` interface (for example a
Redis-backed limiter shared across processes).

## Development

```bash
composer install
composer check   # runs php-cs-fixer, phpstan (level max) and phpunit
```

## License

[MIT](LICENSE)
