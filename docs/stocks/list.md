# `stocks->list()`

Fetch a single page of results.

**Endpoint:** `GET /stocks`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?StockFilter $filter = null): Stocks
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?StockFilter` | no |

## Returns

`Stocks`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\StockFilter;

/** @var Client $client */
$result = $client->stocks->list(page: 1, limit: 100, filter: new StockFilter(/* ... */));
```
