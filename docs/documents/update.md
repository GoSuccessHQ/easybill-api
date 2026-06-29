# `documents->update()`

**Endpoint:** `PUT /documents/{id}`

## Signature

```php
public function update(int $id, Document $document): Document
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$document` | `Document` | yes |

## Returns

`Document`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Document;

/** @var Client $client */
$result = $client->documents->update(id: 123, document: new Document(/* ... */));
```
