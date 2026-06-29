# `webhooks->get()`

**Endpoint:** `GET /webhooks/{id}`

## Signature

```php
public function get(int $id): WebHook
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`WebHook`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->webhooks->get(id: 123);
```
