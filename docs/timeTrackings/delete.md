# `timeTrackings->delete()`

**Endpoint:** `DELETE /time-trackings/{id}`

## Signature

```php
public function delete(int $id): void
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |

## Returns

`void`

## Example

```php
use GoSuccess\Easybill\Client;

/** @var Client $client */
$client->timeTrackings->delete(id: 123);
```
