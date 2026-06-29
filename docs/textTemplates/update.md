# `textTemplates->update()`

**Endpoint:** `PUT /text-templates/{id}`

## Signature

```php
public function update(int $id, TextTemplate $textTemplate): TextTemplate
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$textTemplate` | `TextTemplate` | yes |

## Returns

`TextTemplate`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\TextTemplate;

/** @var Client $client */
$result = $client->textTemplates->update(id: 123, textTemplate: new TextTemplate(/* ... */));
```
