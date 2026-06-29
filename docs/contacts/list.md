# `contacts->list()`

Fetch a single page of a customer's contacts.

## Signature

```php
public function list(int $customerId, int $page = 1, int $limit = 100): Contacts
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerId` | `int` | yes |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`Contacts`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->contacts->list(customerId: 12345, page: 1, limit: 100);
```
