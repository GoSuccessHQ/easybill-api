# `timeTrackings->update()`

**Endpoint:** `PUT /time-trackings/{id}`

## Signature

```php
public function update(int $id, TimeTracking $timeTracking): TimeTracking
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$timeTracking` | `TimeTracking` | yes |

## Returns

`TimeTracking`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\TimeTracking;

/** @var Client $client */
$result = $client->timeTrackings->update(id: 123, timeTracking: new TimeTracking(/* ... */));
```
