# `discountPositionGroups->get()`

**Endpoint:** `GET /discounts/position-group/{id}`

## Signature

```php
public function get(int $id): DiscountPositionGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`DiscountPositionGroup`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->discountPositionGroups->get(id: 123);
```
