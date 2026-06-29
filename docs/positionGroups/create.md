# `positionGroups->create()`

**Endpoint:** `POST /position-groups`

## Signature

```php
public function create(PositionGroup $positionGroup): PositionGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$positionGroup` | `PositionGroup` | yes |

## Returns

`PositionGroup`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\PositionGroup;

/** @var Client $client */
$result = $client->positionGroups->create(positionGroup: new PositionGroup(/* ... */));
```
