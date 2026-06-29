# `customers->get()`

**Endpoint:** `GET /customers/{id}`

## Signature

```php
public function get(int $id): Customer
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
$result = $client->customers->get(id: 123);
```
