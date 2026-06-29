# `customers->update()`

**Endpoint:** `PUT /customers/{id}`

## Signature

```php
public function update(int $id, Customer $customer): Customer
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$customer` | `Customer` | yes |

## Returns

`Customer`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Customer;

/** @var Client $client */
$result = $client->customers->update(id: 123, customer: new Customer(/* ... */));
```
