# `customers->list()`

Fetch a single page of results.

**Endpoint:** `GET /customers`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?CustomerFilter $filter = null): Customers
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?CustomerFilter` | no |

## Returns

`Customers`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\CustomerFilter;

/** @var Client $client */
$result = $client->customers->list(page: 1, limit: 100, filter: new CustomerFilter(/* ... */));
```
