# `customers->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?CustomerFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?CustomerFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\CustomerFilter;

/** @var Client $client */
$result = $client->customers->all(filter: new CustomerFilter(/* ... */), limit: 100);
```
