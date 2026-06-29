# `documents->versions()`

List the versions of a document.

## Signature

```php
public function versions(int $id): DocumentVersions
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`DocumentVersions`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->versions(id: 123);
```
