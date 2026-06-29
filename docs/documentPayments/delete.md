# `documentPayments->delete()`

**Endpoint:** `DELETE /document-payments/{id}`

## Signature

```php
public function delete(int $id): void
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`void`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$client->documentPayments->delete(id: 123);
```
