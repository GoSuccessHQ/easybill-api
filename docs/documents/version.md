# `documents->version()`

Fetch a single version of a document.

## Signature

```php
public function version(int $id, int $versionId): DocumentVersion
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$versionId` | `int` | yes |

## Returns

`DocumentVersion`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->version(id: 123, versionId: 123);
```
