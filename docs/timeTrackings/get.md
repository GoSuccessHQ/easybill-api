# `timeTrackings->get()`

**Endpoint:** `GET /time-trackings/{id}`

## Signature

```php
public function get(int $id): TimeTracking
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`TimeTracking`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->timeTrackings->get(id: 123);
```
