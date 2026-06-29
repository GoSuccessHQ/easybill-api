# `contacts->create()`

## Signature

```php
public function create(int $customerId, Contact $contact): Contact
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerId` | `int` | yes |
| `$contact` | `Contact` | yes |

## Returns

`Contact`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Contact;

/** @var Client $client */
$result = $client->contacts->create(customerId: 12345, contact: new Contact(/* ... */));
```
