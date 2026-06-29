# `documents->create()`

**Endpoint:** `POST /documents`

## Signature

```php
public function create(Document $document): Document
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$document` | `Document` | yes |

## Returns

`Document`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Document;

/** @var Client $client */
$result = $client->documents->create(document: new Document(/* ... */));
```
