# `tasks->get()`

**Endpoint:** `GET /tasks/{id}`

## Signature

```php
public function get(int $id): Task
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`Task`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$result = $client->tasks->get(id: 123);
```
