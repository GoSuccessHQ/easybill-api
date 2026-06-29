# `sepaPayments->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?SepaPaymentFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?SepaPaymentFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\SepaPaymentFilter;

/** @var Client $client */
$result = $client->sepaPayments->all(filter: new SepaPaymentFilter(/* ... */), limit: 100);
```
