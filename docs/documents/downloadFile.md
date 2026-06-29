# `documents->downloadFile()`

Download the document file (e.g. the raw e-invoice XML or PDF).

## Signature

```php
public function downloadFile(int $id): string
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`string`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->downloadFile(id: 123);
```
