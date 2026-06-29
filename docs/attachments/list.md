# `attachments->list()`

Fetch a single page of results.

**Endpoint:** `GET /attachments`

## Signature

```php
public function list(int $page = 1, int $limit = 100): Attachments
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`Attachments`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->attachments->list(page: 1, limit: 100);
```
