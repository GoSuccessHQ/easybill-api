# `attachments->update()`

**Endpoint:** `PUT /attachments/{id}`

## Signature

```php
public function update(int $id, Attachment $attachment): Attachment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$attachment` | `Attachment` | yes |

## Returns

`Attachment`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Attachment;

/** @var Client $client */
$result = $client->attachments->update(id: 123, attachment: new Attachment(/* ... */));
```
