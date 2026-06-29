# `logins->get()`

**Endpoint:** `GET /logins/{id}`

## Signature

```php
public function get(int $id): Login
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Login`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->logins->get(id: 123);
```
