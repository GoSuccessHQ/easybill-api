# `contacts->update()`

## Signature

```php
public function update(int $customerId, int $id, Contact $contact): Contact
```

## Parameters

| Name | Type | Required |
| --- | --- | --- |
| `$customerId` | `int` | yes |
| `$id` | `int` | yes |
| `$contact` | `Contact` | yes |

## Returns

`Contact`

## Example

```php
use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Model\Contact;

/** @var Client $client */
$result = $client->contacts->update(customerId: 12345, id: 123, contact: new Contact(/* ... */));
```
