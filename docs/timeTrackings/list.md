# `timeTrackings->list()`

Fetch a single page of results.

**Endpoint:** `GET /time-trackings`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?TimeTrackingFilter $filter = null): TimeTrackings
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?TimeTrackingFilter` | no |

## Returns

`TimeTrackings`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\TimeTrackingFilter;

/** @var Client $client */
$result = $client->timeTrackings->list(page: 1, limit: 100, filter: new TimeTrackingFilter(/* ... */));
```
