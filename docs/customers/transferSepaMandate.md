# `customers->transferSepaMandate()`

Transfer the SEPA mandate of a customer to another payment provider.

## Signature

```php
public function transferSepaMandate(int $id): Customer
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Customer`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->customers->transferSepaMandate(id: 123);
```
