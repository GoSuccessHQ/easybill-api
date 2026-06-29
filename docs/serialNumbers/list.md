# `serialNumbers->list()`

Fetch a single page of results.

**Endpoint:** `GET /serial-numbers`

## Signature

```php
public function list(int $page = 1, int $limit = 100, ?SerialNumberFilter $filter = null): SerialNumbers
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |
| `$filter` | `?SerialNumberFilter` | no |

## Returns

`SerialNumbers`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\SerialNumberFilter;

/** @var Client $client */
$result = $client->serialNumbers->list(page: 1, limit: 100, filter: new SerialNumberFilter(/* ... */));
```
