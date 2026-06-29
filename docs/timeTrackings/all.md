# `timeTrackings->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?TimeTrackingFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?TimeTrackingFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\TimeTrackingFilter;

/** @var Client $client */
$result = $client->timeTrackings->all(filter: new TimeTrackingFilter(/* ... */), limit: 100);
```
