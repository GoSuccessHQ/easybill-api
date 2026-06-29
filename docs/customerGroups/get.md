# `customerGroups->get()`

**Endpoint:** `GET /customer-groups/{id}`

## Signature

```php
public function get(int $id): CustomerGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`CustomerGroup`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->customerGroups->get(id: 123);
```
