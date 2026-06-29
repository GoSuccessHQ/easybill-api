# `discountPositions->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?DiscountPositionFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?DiscountPositionFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DiscountPositionFilter;

/** @var Client $client */
$result = $client->discountPositions->all(filter: new DiscountPositionFilter(/* ... */), limit: 100);
```
