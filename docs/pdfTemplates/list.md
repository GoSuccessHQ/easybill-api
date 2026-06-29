# `pdfTemplates->list()`

Fetch the full set of available PDF templates.

**Endpoint:** `GET /pdf-templates`

## Signature

```php
public function list(?PdfTemplateFilter $filter = null): PDFTemplates
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?PdfTemplateFilter` | no |

## Returns

`PDFTemplates`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\PdfTemplateFilter;

/** @var Client $client */
$result = $client->pdfTemplates->list(filter: new PdfTemplateFilter(/* ... */));
```
