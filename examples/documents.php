<?php

declare(strict_types=1);

/**
 * Documents: create an invoice, complete it, download the PDF and send it.
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Enum\DocumentSendType;
use GoSuccess\Easybill\Enum\DocumentType;
use GoSuccess\Easybill\Filter\DocumentFilter;
use GoSuccess\Easybill\Model\Document;
use GoSuccess\Easybill\Model\DocumentPosition;
use GoSuccess\Easybill\Model\PostBoxRequest;

/** @var Client $client */
$client = require __DIR__ . '/bootstrap.php';

// Create a draft invoice for a customer
$document = $client->documents->create(new Document(
    type: DocumentType::Invoice,
    customerId: 12345,
    items: [
        new DocumentPosition(description: 'Consulting', quantity: 3.0, singlePriceNet: 10000),
    ],
));

printf("Created %s #%d\n", $document->type?->value, $document->id);

// Mark it as done (this assigns the final invoice number)
$done = $client->documents->done($document->id);
printf("Completed, number: %s\n", $done->number);

// Download the PDF
file_put_contents(__DIR__ . '/invoice.pdf', $client->documents->pdf($document->id));
echo "Saved invoice.pdf\n";

// Send it by e-mail
$client->documents->send($document->id, DocumentSendType::Email, new PostBoxRequest(
    // ... e.g. recipient configuration ...
));
echo "Sent by e-mail\n";

// List only invoices
foreach ($client->documents->all(new DocumentFilter(type: DocumentType::Invoice)) as $invoice) {
    printf("Invoice %s: %d cents\n", $invoice->number, $invoice->amount ?? 0);
}
