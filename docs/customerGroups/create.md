# `customerGroups->create()`

**Endpoint:** `POST /customer-groups`

## Signature

```php
public function create(CustomerGroup $customerGroup): CustomerGroup
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerGroup` | `CustomerGroup` | yes |

## Returns

`CustomerGroup`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\CustomerGroup;

/** @var Client $client */
$result = $client->customerGroups->create(customerGroup: new CustomerGroup(/* ... */));
```
