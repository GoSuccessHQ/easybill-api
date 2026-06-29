# `textTemplates->create()`

**Endpoint:** `POST /text-templates`

## Signature

```php
public function create(TextTemplate $textTemplate): TextTemplate
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$textTemplate` | `TextTemplate` | yes |

## Returns

`TextTemplate`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\TextTemplate;

/** @var Client $client */
$result = $client->textTemplates->create(textTemplate: new TextTemplate(/* ... */));
```
