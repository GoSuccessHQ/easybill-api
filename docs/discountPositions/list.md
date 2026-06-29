# `discountPositions->list()`

Fetch a single page of results.

**Endpoint:** `GET /discounts/position`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?DiscountPositionFilter $filter = null): DiscountPositions
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?DiscountPositionFilter` | no |

## Returns

`DiscountPositions`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DiscountPositionFilter;

/** @var Client $client */
$result = $client->discountPositions->list(page: 1, limit: 100, filter: new DiscountPositionFilter(/* ... */));
```
