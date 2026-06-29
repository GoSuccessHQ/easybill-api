# `discountPositions->create()`

**Endpoint:** `POST /discounts/position`

## Signature

```php
public function create(DiscountPosition $discountPosition): DiscountPosition
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$discountPosition` | `DiscountPosition` | yes |

## Returns

`DiscountPosition`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\DiscountPosition;

/** @var Client $client */
$result = $client->discountPositions->create(discountPosition: new DiscountPosition(/* ... */));
```
