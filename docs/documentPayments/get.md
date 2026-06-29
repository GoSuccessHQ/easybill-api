# `documentPayments->get()`

**Endpoint:** `GET /document-payments/{id}`

## Signature

```php
public function get(int $id): DocumentPayment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`DocumentPayment`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documentPayments->get(id: 123);
```
