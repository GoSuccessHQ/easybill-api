# `stocks->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?StockFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?StockFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\StockFilter;

/** @var Client $client */
$result = $client->stocks->all(filter: new StockFilter(/* ... */), limit: 100);
```
