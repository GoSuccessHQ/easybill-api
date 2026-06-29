# `documents->all()`

Iterate lazily over every document across all pages.

## Signature

```php
public function all(?DocumentFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?DocumentFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DocumentFilter;

/** @var Client $client */
$result = $client->documents->all(filter: new DocumentFilter(/* ... */), limit: 100);
```
