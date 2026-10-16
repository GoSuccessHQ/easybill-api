# easybill API – PHP Client

A modern, strongly-typed, **dependency-free** PHP client for the
[easybill REST API](https://api.easybill.de/rest/v1/swagger.json), built for
**PHP 8.4+** with first-class **rate-limit handling**.

## Features

- **PHP 8.4+**, fully typed `final readonly` DTOs and native enums for every API model.
- **Zero Composer dependencies** — ships with a self-contained cURL transport
  (only the `ext-curl` and `ext-json` PHP extensions are required).
- **Pluggable transport**: implement the small `HttpClient` interface to route
  requests through your own HTTP stack (e.g. Guzzle) — without the library depending on it.
- **Built-in rate limiting.** easybill currently allows 10 or 60 requests/minute and does not
  reliably advertise the limit in response headers. The client therefore throttles requests
  **proactively** and the limit is **freely configurable**.
- Automatic retry with exponential backoff on `429` / transient errors, honoring `Retry-After`
  (`retryOnRateLimit: false` makes a `429` throw at once, while transient errors are still retried)
  when the API provides it.
- Typed exception hierarchy for every documented HTTP error.
- Lazy pagination over all result pages.

## Requirements

- PHP **8.4** or higher
- `ext-curl` and `ext-json`

## Installation

```bash
composer require gosuccess/easybill-api
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
echo $customer->companyName;

// Create a customer
use GoSuccess\Easybill\Model\Customer;
use GoSuccess\Easybill\Enum\Salutation;

$created = $client->customers->create(new Customer(
    companyName: 'ACME GmbH',
    salutation: Salutation::Company,
    emails: ['billing@acme.example'],
));
```

## Partial updates and clearing fields

Models serialize **only what you actually passed**, so an update touches nothing
else. Because of that, a field you leave out and a field you set to `null` must
mean two different things:

```php
use GoSuccess\Easybill\Model\Customer;

// Renames the customer. Every other field keeps its current value.
$client->customers->update(12345, new Customer(companyName: 'ACME SE'));

// Clears the note: `null` is sent as an explicit JSON null.
$client->customers->update(12345, new Customer(note: null));

// Same for lists — `[]` empties them.
$client->customers->update(12345, new Customer(emails: []));
```

To make a field conditional, fall back to the `Undefined` sentinel — the default
of every writable parameter — instead of `null`:

```php
use GoSuccess\Easybill\Model\Undefined;

$client->customers->update(12345, new Customer(
    note: $clearNote ? null : Undefined::Value,
));
```

Reading is unaffected: properties stay plainly typed (`?string`, `list<string>`),
never sentinel-valued. A model returned by the API carries no intent to clear
anything, so passing one straight back never nulls out fields.

## Pagination

Each list endpoint offers `list()` for a single page and `all()` for a lazy
iterator over every page (each page request is rate-limited automatically).
Filters are **strongly typed** per endpoint:

```php
use GoSuccess\Easybill\Filter\CustomerFilter;
use GoSuccess\Easybill\Filter\DocumentFilter;
use GoSuccess\Easybill\Enum\DocumentType;

// One page
$page = $client->customers->list(page: 1, limit: 100, filter: new CustomerFilter(country: 'DE'));
echo $page->total, ' customers in total';

// All customers, transparently across pages
foreach ($client->customers->all(new CustomerFilter(country: 'DE')) as $customer) {
    echo $customer->companyName, PHP_EOL;
}

// Enum-typed filters, e.g. only draft invoices
foreach ($client->documents->all(new DocumentFilter(type: DocumentType::Invoice, isDraft: true)) as $document) {
    // ...
}
```

## Rate limiting

The request limit is configured via `ClientConfig::$requestsPerMinute`. The default
`SlidingWindowRateLimiter` keeps the client below that threshold so you avoid `429` responses
entirely. You can swap in your own implementation of the `RateLimiter` interface (for example a
Redis-backed limiter shared across processes):

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;

$client = new Client(
    config: new ClientConfig(token: 'your-api-key'),
    rateLimiter: new MyRedisRateLimiter(/* ... */),
);
```

## Error handling

Every error thrown by the library implements `GoSuccess\Easybill\Exception\EasybillException`:

```php
use GoSuccess\Easybill\Exception\NotFoundException;
use GoSuccess\Easybill\Exception\RateLimitException;
use GoSuccess\Easybill\Exception\ValidationException;

try {
    $client->customers->get(999999);
} catch (NotFoundException $e) {
    // 404
} catch (ValidationException $e) {
    // 422 — inspect $e->responseBody
} catch (RateLimitException $e) {
    // 429 — $e->retryAfter holds the seconds to wait, if provided
}
```

## Custom transport

Bring your own HTTP client by implementing `HttpClient`:

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;
use GoSuccess\Easybill\Http\HttpClient;
use GoSuccess\Easybill\Http\Request;
use GoSuccess\Easybill\Http\Response;

final class GuzzleTransport implements HttpClient
{
    public function send(Request $request): Response { /* ... */ }
}

$client = new Client(
    config: new ClientConfig(token: 'your-api-key'),
    httpClient: new GuzzleTransport(),
);
```

## Documentation & examples

- **[docs/](docs/)** — a reference page for every resource method (endpoint,
  signature, parameters and a usage example).
- **[examples/](examples/)** — runnable example scripts (CRUD, pagination,
  documents, error handling, rate limiting, custom transport).

## Available resources

`customers`, `contacts`, `customerGroups`, `documents`, `documentPayments`,
`positions`, `positionGroups`, `discountPositions`, `discountPositionGroups`,
`projects`, `tasks`, `textTemplates`, `timeTrackings`, `attachments`, `postBoxes`,
`sepaPayments`, `serialNumbers`, `stocks`, `logins`, `webhooks`, `pdfTemplates`.

## Development

The data models, enums and filter objects are generated from a committed
snapshot of the official Swagger specification ([resources/swagger.json](resources/swagger.json)),
and the plain resource classes from a declarative config:

```bash
php tools/generate-models.php          # enums, DTOs and typed filters (from the snapshot)
php tools/generate-resources.php       # the plain CRUD/partial resource classes
php tools/generate-docs.php            # the per-method reference pages under docs/
composer cs-fix                        # apply code style
composer check                         # php-cs-fixer + phpstan (level max) + phpunit
```

To refresh against the live API, update the snapshot first and then rerun the
generators above:

```bash
curl -s https://api.easybill.de/rest/v1/swagger.json -o resources/swagger.json
php tools/generate-models.php
php tools/generate-resources.php
php tools/generate-docs.php
composer cs-fix
```

CI regenerates everything and fails if the committed output is out of date.

> Running the test suite additionally requires the `dom`, `xml`, `xmlwriter`,
> `mbstring` and `tokenizer` PHP extensions (PHPUnit dependencies).

## License

[MIT](LICENSE)
