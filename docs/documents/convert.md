# `documents->convert()`

Convert a document into another type (e.g. an offer into an invoice).

## Signature

```php
public function convert(int $id, DocumentConvertTarget $type, ?string $pdfTemplate = null): Document
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$type` | `DocumentConvertTarget` | yes |
| `$pdfTemplate` | `?string` | no |

## Returns

`Document`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Enum\DocumentConvertTarget;

/** @var Client $client */
$result = $client->documents->convert(id: 123, type: DocumentConvertTarget::Dunning);
```
