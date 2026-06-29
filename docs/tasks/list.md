# `tasks->list()`

Fetch a single page of results.

**Endpoint:** `GET /tasks`

## Signature

```php
public function list(int $page = 1, int $limit = 100): Tasks
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`Tasks`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->tasks->list(page: 1, limit: 100);
```
