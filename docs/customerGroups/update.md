# `customerGroups->update()`

**Endpoint:** `PUT /customer-groups/{id}`

## Signature

```php
public function update(int $id, CustomerGroup $customerGroup): CustomerGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$id` | `int` | yes |
| `$customerGroup` | `CustomerGroup` | yes |

## Returns

`CustomerGroup`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\CustomerGroup;

/** @var Client $client */
$result = $client->customerGroups->update(id: 123, customerGroup: new CustomerGroup(/* ... */));
```
