# `positions->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?PositionFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?PositionFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\PositionFilter;

/** @var Client $client */
$result = $client->positions->all(filter: new PositionFilter(/* ... */), limit: 100);
```
