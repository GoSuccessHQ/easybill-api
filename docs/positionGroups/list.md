# `positionGroups->list()`

Fetch a single page of results.

**Endpoint:** `GET /position-groups`

## Signature

```php
public function list(int $page = 1, int $limit = 100): PositionGroups
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`PositionGroups`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->positionGroups->list(page: 1, limit: 100);
```
