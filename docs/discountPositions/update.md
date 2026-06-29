# `discountPositions->update()`

**Endpoint:** `PUT /discounts/position/{id}`

## Signature

```php
public function update(int $id, DiscountPosition $discountPosition): DiscountPosition
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$discountPosition` | `DiscountPosition` | yes |

## Returns

`DiscountPosition`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\DiscountPosition;

/** @var Client $client */
$result = $client->discountPositions->update(id: 123, discountPosition: new DiscountPosition(/* ... */));
```
