# `documentPayments->create()`

**Endpoint:** `POST /document-payments`

## Signature

```php
public function create(DocumentPayment $documentPayment): DocumentPayment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$documentPayment` | `DocumentPayment` | yes |

## Returns

`DocumentPayment`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\DocumentPayment;

/** @var Client $client */
$result = $client->documentPayments->create(documentPayment: new DocumentPayment(/* ... */));
```
