# `sepaPayments->update()`

**Endpoint:** `PUT /sepa-payments/{id}`

## Signature

```php
public function update(int $id, SEPAPayment $sEPAPayment): SEPAPayment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$sEPAPayment` | `SEPAPayment` | yes |

## Returns

`SEPAPayment`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\SEPAPayment;

/** @var Client $client */
$result = $client->sepaPayments->update(id: 123, sEPAPayment: new SEPAPayment(/* ... */));
```
