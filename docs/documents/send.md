# `documents->send()`

Send a document via the given channel.

For `DocumentSendType::Email`, `PostBoxRequest::$to` and `$cc` accept multiple
addresses separated by comma, semicolon or newline. Every address in `$to` is
delivered as a `To:` recipient.

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
