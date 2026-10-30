# `documents->downloadFile()`

Download the document file in the format configured on the document.

The default `application/pdf` returns the e-invoice PDF with embedded XML for a
ZUGFeRD document; use `application/xml;format=xrechnung` for the raw XRechnung XML.
easybill rejects `application/octet-stream` and wildcards with 406/400.

## Signature

```php
public function downloadFile(int $id, string $accept = 'application/pdf'): string
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$accept` | `string` | no |

## Returns

`string`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->documents->downloadFile(id: 123);
```
