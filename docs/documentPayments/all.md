# `documentPayments->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(?DocumentPaymentFilter $filter = null, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?DocumentPaymentFilter` | no |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\DocumentPaymentFilter;

/** @var Client $client */
$result = $client->documentPayments->all(filter: new DocumentPaymentFilter(/* ... */), limit: 100);
```
