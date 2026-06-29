# `serialNumbers->create()`

**Endpoint:** `POST /serial-numbers`

## Signature

```php
public function create(SerialNumber $serialNumber): SerialNumber
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$serialNumber` | `SerialNumber` | yes |

## Returns

`SerialNumber`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\SerialNumber;

/** @var Client $client */
$result = $client->serialNumbers->create(serialNumber: new SerialNumber(/* ... */));
```
