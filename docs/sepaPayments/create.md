# `sepaPayments->create()`

**Endpoint:** `POST /sepa-payments`

## Signature

```php
public function create(SEPAPayment $sEPAPayment): SEPAPayment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$sEPAPayment` | `SEPAPayment` | yes |

## Returns

`SEPAPayment`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\SEPAPayment;

/** @var Client $client */
$result = $client->sepaPayments->create(sEPAPayment: new SEPAPayment(/* ... */));
```
