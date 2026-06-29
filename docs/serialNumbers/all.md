# `serialNumbers->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?SerialNumberFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?SerialNumberFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\SerialNumberFilter;

/** @var Client $client */
$result = $client->serialNumbers->all(filter: new SerialNumberFilter(/* ... */), limit: 100);
```
