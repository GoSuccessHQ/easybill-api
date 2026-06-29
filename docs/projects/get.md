# `projects->get()`

**Endpoint:** `GET /projects/{id}`

## Signature

```php
public function get(int $id): Project
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Project`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->projects->get(id: 123);
```
