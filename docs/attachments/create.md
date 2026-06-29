# `attachments->create()`

**Endpoint:** `POST /attachments`

## Signature

```php
public function create(Attachment $attachment): Attachment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$attachment` | `Attachment` | yes |

## Returns

`Attachment`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Attachment;

/** @var Client $client */
$result = $client->attachments->create(attachment: new Attachment(/* ... */));
```
