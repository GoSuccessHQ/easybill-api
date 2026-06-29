# `logins->list()`

Fetch a single page of results.

**Endpoint:** `GET /logins`

## Signature

```php
public function list(int $page = 1, int $limit = 100): Logins
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`Logins`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->logins->list(page: 1, limit: 100);
```
