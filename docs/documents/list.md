# `documents->list()`

Fetch a single page of documents.

**Endpoint:** `GET /documents`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?DocumentFilter $filter = null): Documents
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?DocumentFilter` | no |

## Returns

`Documents`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DocumentFilter;

/** @var Client $client */
$result = $client->documents->list(page: 1, limit: 100, filter: new DocumentFilter(/* ... */));
```
