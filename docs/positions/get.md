# `positions->get()`

**Endpoint:** `GET /positions/{id}`

## Signature

```php
public function get(int $id): Position
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Position`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->positions->get(id: 123);
```
