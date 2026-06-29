# `postBoxes->get()`

**Endpoint:** `GET /post-boxes/{id}`

## Signature

```php
public function get(int $id): PostBox
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`PostBox`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->postBoxes->get(id: 123);
```
