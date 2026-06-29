# `documents->jpg()`

Download the document as a JPG image.

## Signature

```php
public function jpg(int $id): string
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
$result = $client->documents->jpg(id: 123);
```
