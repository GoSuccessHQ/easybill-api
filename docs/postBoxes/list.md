# `postBoxes->list()`

Fetch a single page of results.

**Endpoint:** `GET /post-boxes`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?PostBoxFilter $filter = null): PostBoxes
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?PostBoxFilter` | no |

## Returns

`PostBoxes`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\PostBoxFilter;

/** @var Client $client */
$result = $client->postBoxes->list(page: 1, limit: 100, filter: new PostBoxFilter(/* ... */));
```
