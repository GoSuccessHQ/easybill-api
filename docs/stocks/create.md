# `stocks->create()`

**Endpoint:** `POST /stocks`

## Signature

```php
public function create(Stock $stock): Stock
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$stock` | `Stock` | yes |

## Returns

`Stock`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Stock;

/** @var Client $client */
$result = $client->stocks->create(stock: new Stock(/* ... */));
```
