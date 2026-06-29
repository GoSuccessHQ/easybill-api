# `discountPositionGroups->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?DiscountPositionGroupFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?DiscountPositionGroupFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DiscountPositionGroupFilter;

/** @var Client $client */
$result = $client->discountPositionGroups->all(filter: new DiscountPositionGroupFilter(/* ... */), limit: 100);
```
