# `documents->done()`

Mark a document as done (completed).

Not allowed for documents of type `RECURRING`; the API rejects those with a `400`.
Update the recurring status instead via `update()` with `recurring_options.status`.

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
