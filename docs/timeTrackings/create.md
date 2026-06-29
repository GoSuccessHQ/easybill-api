# `timeTrackings->create()`

**Endpoint:** `POST /time-trackings`

## Signature

```php
public function create(TimeTracking $timeTracking): TimeTracking
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$timeTracking` | `TimeTracking` | yes |

## Returns

`TimeTracking`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\TimeTracking;

/** @var Client $client */
$result = $client->timeTrackings->create(timeTracking: new TimeTracking(/* ... */));
```
