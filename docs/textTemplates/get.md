# `textTemplates->get()`

**Endpoint:** `GET /text-templates/{id}`

## Signature

```php
public function get(int $id): TextTemplate
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`TextTemplate`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->textTemplates->get(id: 123);
```
