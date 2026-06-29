# `webhooks->create()`

**Endpoint:** `POST /webhooks`

## Signature

```php
public function create(WebHook $webHook): WebHook
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$webHook` | `WebHook` | yes |

## Returns

`WebHook`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\WebHook;

/** @var Client $client */
$result = $client->webhooks->create(webHook: new WebHook(/* ... */));
```
