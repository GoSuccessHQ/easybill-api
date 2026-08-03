<?php

declare(strict_types=1);

/**
 * Customer CRUD: create, read, update and delete a customer.
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Enum\Salutation;
use GoSuccess\Easybill\Model\Customer;

/** @var Client $client */
$client = require __DIR__ . '/bootstrap.php';

// Create
$customer = $client->customers->create(new Customer(
    companyName: 'ACME GmbH',
    salutation: Salutation::Company,
    street: 'Musterstraße 1',
    zipCode: '10115',
    city: 'Berlin',
    country: 'DE',
    emails: ['billing@acme.example'],
));

printf("Created customer #%d: %s\n", $customer->id, $customer->companyName);

// Read
$fetched = $client->customers->get($customer->id);
printf("Fetched: %s in %s\n", $fetched->displayName, $fetched->city);

// Update (only the fields you set are sent)
$updated = $client->customers->update($customer->id, new Customer(note: 'VIP customer'));
printf("Updated note: %s\n", $updated->note);

// Clear a field: an explicit null is sent as a JSON null, while every field you
// leave out keeps its current value.
$cleared = $client->customers->update($customer->id, new Customer(note: null));
printf("Note after clearing: %s\n", var_export($cleared->note, true));

// Delete
$client->customers->delete($customer->id);
echo "Deleted.\n";
