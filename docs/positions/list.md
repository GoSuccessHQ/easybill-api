# `positions->list()`

Fetch a single page of results.

**Endpoint:** `GET /positions`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?PositionFilter $filter = null): Positions
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?PositionFilter` | no |

## Returns

`Positions`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\PositionFilter;

/** @var Client $client */
$result = $client->positions->list(page: 1, limit: 100, filter: new PositionFilter(/* ... */));
```
