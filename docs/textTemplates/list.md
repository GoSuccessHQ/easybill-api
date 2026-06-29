# `textTemplates->list()`

Fetch a single page of results.

**Endpoint:** `GET /text-templates`

## Signature

```php
public function list(int $page = 1, int $limit = 100): TextTemplates
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`TextTemplates`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->textTemplates->list(page: 1, limit: 100);
```
