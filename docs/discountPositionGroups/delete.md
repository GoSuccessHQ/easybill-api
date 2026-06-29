# `discountPositionGroups->delete()`

**Endpoint:** `DELETE /discounts/position-group/{id}`

## Signature

```php
public function delete(int $id): void
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`void`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$client->discountPositionGroups->delete(id: 123);
```
