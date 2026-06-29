# `documents->pdf()`

Download the document as a PDF.

## Signature

```php
public function pdf(int $id): string
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
$result = $client->documents->pdf(id: 123);
```
