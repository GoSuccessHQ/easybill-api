# `projects->list()`

Fetch a single page of results.

**Endpoint:** `GET /projects`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?ProjectFilter $filter = null): Projects
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?ProjectFilter` | no |

## Returns

`Projects`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\ProjectFilter;

/** @var Client $client */
$result = $client->projects->list(page: 1, limit: 100, filter: new ProjectFilter(/* ... */));
```
