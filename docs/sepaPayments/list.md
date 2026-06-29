# `sepaPayments->list()`

Fetch a single page of results.

**Endpoint:** `GET /sepa-payments`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?SepaPaymentFilter $filter = null): SEPAPayments
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?SepaPaymentFilter` | no |

## Returns

`SEPAPayments`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\SepaPaymentFilter;

/** @var Client $client */
$result = $client->sepaPayments->list(page: 1, limit: 100, filter: new SepaPaymentFilter(/* ... */));
```
