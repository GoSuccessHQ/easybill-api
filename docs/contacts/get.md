# `contacts->get()`

## Signature

```php
public function get(int $customerId, int $id): Contact
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerId` | `int` | yes |
| `$id` | `int` | yes |

## Returns

`Contact`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->contacts->get(customerId: 12345, id: 123);
```
