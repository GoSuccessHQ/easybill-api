# `documents->send()`

Send a document via the given channel.

## Signature

```php
public function send(int $id, DocumentSendType $type, PostBoxRequest $request): void
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$type` | `DocumentSendType` | yes |
| `$request` | `PostBoxRequest` | yes |

## Returns

`void`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Enum\DocumentSendType;
use GoSuccess\Easybill\Model\PostBoxRequest;

/** @var Client $client */
$client->documents->send(id: 123, type: DocumentSendType::Email, request: new PostBoxRequest(/* ... */));
```
