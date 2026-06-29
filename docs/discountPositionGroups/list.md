# `discountPositionGroups->list()`

Fetch a single page of results.

**Endpoint:** `GET /discounts/position-group`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?DiscountPositionGroupFilter $filter = null): DiscountPositionGroups
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?DiscountPositionGroupFilter` | no |

## Returns

`DiscountPositionGroups`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DiscountPositionGroupFilter;

/** @var Client $client */
$result = $client->discountPositionGroups->list(page: 1, limit: 100, filter: new DiscountPositionGroupFilter(/* ... */));
```
