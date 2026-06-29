# `attachments->get()`

**Endpoint:** `GET /attachments/{id}`

## Signature

```php
public function get(int $id): Attachment
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Attachment`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->attachments->get(id: 123);
```
