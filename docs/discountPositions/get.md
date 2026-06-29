# `discountPositions->get()`

**Endpoint:** `GET /discounts/position/{id}`

## Signature

```php
public function get(int $id): DiscountPosition
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`DiscountPosition`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->discountPositions->get(id: 123);
```
