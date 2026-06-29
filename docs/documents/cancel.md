# `documents->cancel()`

Cancel a document (creating a cancellation document).

## Signature

```php
public function cancel(int $id, ?bool $useTextFromTemplate = null): Document
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$useTextFromTemplate` | `?bool` | no |

## Returns

`Document`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->cancel(id: 123);
```
