# `discountPositionGroups->update()`

**Endpoint:** `PUT /discounts/position-group/{id}`

## Signature

```php
public function update(int $id, DiscountPositionGroup $discountPositionGroup): DiscountPositionGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$discountPositionGroup` | `DiscountPositionGroup` | yes |

## Returns

`DiscountPositionGroup`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\DiscountPositionGroup;

/** @var Client $client */
$result = $client->discountPositionGroups->update(id: 123, discountPositionGroup: new DiscountPositionGroup(/* ... */));
```
