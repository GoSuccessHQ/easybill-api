# `webhooks->all()`

Iterate lazily over every item across all pages.

## Signature

```php
public function all(int $limit = 100): Paginator
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$limit` | `int` | no |

## Returns

`Paginator`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->webhooks->all(limit: 100);
```
