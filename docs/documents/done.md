# `documents->done()`

Mark a document as done (completed).

## Signature

```php
public function done(int $id, ?string $reasonForChange = null): Document
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$reasonForChange` | `?string` | no |

## Returns

`Document`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->done(id: 123);
```
