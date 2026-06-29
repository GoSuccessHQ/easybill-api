# `positionGroups->update()`

**Endpoint:** `PUT /position-groups/{id}`

## Signature

```php
public function update(int $id, PositionGroup $positionGroup): PositionGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$positionGroup` | `PositionGroup` | yes |

## Returns

`PositionGroup`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\PositionGroup;

/** @var Client $client */
$result = $client->positionGroups->update(id: 123, positionGroup: new PositionGroup(/* ... */));
```
