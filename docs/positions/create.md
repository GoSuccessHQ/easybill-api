# `positions->create()`

**Endpoint:** `POST /positions`

## Signature

```php
public function create(Position $position): Position
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$position` | `Position` | yes |

## Returns

`Position`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Position;

/** @var Client $client */
$result = $client->positions->create(position: new Position(/* ... */));
```
