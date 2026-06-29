# `documents->get()`

**Endpoint:** `GET /documents/{id}`

## Signature

```php
public function get(int $id): Document
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Document`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->get(id: 123);
```
