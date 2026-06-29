# `contacts->all()`

Iterate lazily over every contact of a customer across all pages.

## Signature

```php
public function all(int $customerId, int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerId` | `int` | yes |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->contacts->all(customerId: 12345, limit: 100);
```
