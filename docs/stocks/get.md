# `stocks->get()`

**Endpoint:** `GET /stocks/{id}`

## Signature

```php
public function get(int $id): Stock
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Stock`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->stocks->get(id: 123);
```
