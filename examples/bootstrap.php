<?php

declare(strict_types=1);

/**
 * Shared bootstrap for the example scripts.
 *
 * Set your API key via the EASYBILL_API_TOKEN environment variable before running
 * any example, e.g.:
 *
 *   EASYBILL_API_TOKEN=your-api-key php examples/customers.php
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;

require __DIR__ . '/../vendor/autoload.php';

$token = getenv('EASYBILL_API_TOKEN');

if (!is_string($token) || $token === '') {
    fwrite(STDERR, "Please set the EASYBILL_API_TOKEN environment variable.\n");
    exit(1);
}

return new Client(new ClientConfig(
    token: $token,
    // Match this to your account's limit (easybill currently allows 10 or 60/min).
    requestsPerMinute: 60,
));
