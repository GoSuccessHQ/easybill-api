# `documents->delete()`

**Endpoint:** `DELETE /documents/{id}`

## Signature

```php
public function delete(int $id): void
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`void`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$client->documents->delete(id: 123);
```
