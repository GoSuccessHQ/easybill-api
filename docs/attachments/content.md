# `attachments->content()`

Download the raw binary content of an attachment.

## Signature

```php
public function content(int $id): string
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`string`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->attachments->content(id: 123);
```
