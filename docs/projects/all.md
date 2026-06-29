# `projects->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?ProjectFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?ProjectFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\ProjectFilter;

/** @var Client $client */
$result = $client->projects->all(filter: new ProjectFilter(/* ... */), limit: 100);
```
