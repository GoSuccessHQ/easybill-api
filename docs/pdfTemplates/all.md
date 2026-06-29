# `pdfTemplates->all()`

Fetch the available PDF templates as a plain list.

## Signature

```php
public function all(?PdfTemplateFilter $filter = null): array
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$filter` | `?PdfTemplateFilter` | no |

## Returns

`array`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Filter\PdfTemplateFilter;

/** @var Client $client */
$result = $client->pdfTemplates->all(filter: new PdfTemplateFilter(/* ... */));
```
