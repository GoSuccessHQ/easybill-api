# `webhooks->update()`

**Endpoint:** `PUT /webhooks/{id}`

## Signature

```php
public function update(int $id, WebHook $webHook): WebHook
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$webHook` | `WebHook` | yes |

## Returns

`WebHook`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\WebHook;

/** @var Client $client */
$result = $client->webhooks->update(id: 123, webHook: new WebHook(/* ... */));
```
