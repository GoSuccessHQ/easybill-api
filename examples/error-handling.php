<?php

declare(strict_types=1);

/**
 * Error handling: catching the typed exception hierarchy.
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\Exception\EasybillException;
use GoSuccess\Easybill\Exception\NotFoundException;
use GoSuccess\Easybill\Exception\RateLimitException;
use GoSuccess\Easybill\Exception\ValidationException;

/** @var Client $client */
$client = require __DIR__ . '/bootstrap.php';

try {
    $client->customers->get(999999999);
} catch (NotFoundException $e) {
    printf("Not found (HTTP %d)\n", $e->statusCode);
} catch (ValidationException $e) {
    printf("Validation failed: %s\n", $e->responseBody);
} catch (RateLimitException $e) {
    // With the built-in rate limiter this should not happen, but just in case:
    printf("Rate limited, retry after %s seconds\n", $e->retryAfter ?? 'unknown');
} catch (EasybillException $e) {
    // Catch-all for every error thrown by this library
    printf("API error: %s\n", $e->getMessage());
}
