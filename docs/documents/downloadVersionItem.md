# `documents->downloadVersionItem()`

Download a single item of a document version.

## Signature

```php
public function downloadVersionItem(int $id, int $versionId, int $versionItemId): string
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$versionId` | `int` | yes |
| `$versionItemId` | `int` | yes |

## Returns

`string`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->downloadVersionItem(id: 123, versionId: 123, versionItemId: 123);
```
