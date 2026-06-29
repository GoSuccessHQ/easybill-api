# `customers->create()`

**Endpoint:** `POST /customers`

## Signature

```php
public function create(Customer $customer): Customer
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customer` | `Customer` | yes |

## Returns

`Customer`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Customer;

/** @var Client $client */
$result = $client->customers->create(customer: new Customer(/* ... */));
```
