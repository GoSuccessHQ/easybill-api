# `webhooks->list()`

Fetch a single page of results.

**Endpoint:** `GET /webhooks`

## Signature

```php
public function list(int $page = 1, int $limit = 100): WebHooks
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`WebHooks`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->webhooks->list(page: 1, limit: 100);
```
