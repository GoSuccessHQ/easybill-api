# `serialNumbers->get()`

**Endpoint:** `GET /serial-numbers/{id}`

## Signature

```php
public function get(int $id): SerialNumber
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`SerialNumber`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->serialNumbers->get(id: 123);
```
