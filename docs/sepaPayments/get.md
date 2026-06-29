# `sepaPayments->get()`

**Endpoint:** `GET /sepa-payments/{id}`

## Signature

```php
public function get(int $id): SEPAPayment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`SEPAPayment`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->sepaPayments->get(id: 123);
```
