# `contacts->delete()`

## Signature

```php
public function delete(int $customerId, int $id): void
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerId` | `int` | yes |
| `$id` | `int` | yes |

## Returns

`void`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$client->contacts->delete(customerId: 12345, id: 123);
```
