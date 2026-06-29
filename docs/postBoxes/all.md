# `postBoxes->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?PostBoxFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?PostBoxFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\PostBoxFilter;

/** @var Client $client */
$result = $client->postBoxes->all(filter: new PostBoxFilter(/* ... */), limit: 100);
```
