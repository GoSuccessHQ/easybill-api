# `documentPayments->list()`

Fetch a single page of results.

**Endpoint:** `GET /document-payments`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?DocumentPaymentFilter $filter = null): DocumentPayments
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?DocumentPaymentFilter` | no |

## Returns

`DocumentPayments`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DocumentPaymentFilter;

/** @var Client $client */
$result = $client->documentPayments->list(page: 1, limit: 100, filter: new DocumentPaymentFilter(/* ... */));
```
