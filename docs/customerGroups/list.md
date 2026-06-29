# `customerGroups->list()`

Fetch a single page of results.

**Endpoint:** `GET /customer-groups`

## Signature

```php
public function list(int $page = 1, int $limit = 100): CustomerGroups
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$page` | `int` | no |
| `$limit` | `int` | no |

## Returns

`CustomerGroups`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->customerGroups->list(page: 1, limit: 100);
```
