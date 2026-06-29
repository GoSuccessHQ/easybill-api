# `positions->update()`

**Endpoint:** `PUT /positions/{id}`

## Signature

```php
public function update(int $id, Position $position): Position
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$position` | `Position` | yes |

## Returns

`Position`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Position;

/** @var Client $client */
$result = $client->positions->update(id: 123, position: new Position(/* ... */));
```
