# `discountPositionGroups->create()`

**Endpoint:** `POST /discounts/position-group`

## Signature

```php
public function create(DiscountPositionGroup $discountPositionGroup): DiscountPositionGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$discountPositionGroup` | `DiscountPositionGroup` | yes |

## Returns

`DiscountPositionGroup`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\DiscountPositionGroup;

/** @var Client $client */
$result = $client->discountPositionGroups->create(discountPositionGroup: new DiscountPositionGroup(/* ... */));
```
