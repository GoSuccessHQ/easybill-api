# `positionGroups->get()`

**Endpoint:** `GET /position-groups/{id}`

## Signature

```php
public function get(int $id): PositionGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`PositionGroup`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->positionGroups->get(id: 123);
```
