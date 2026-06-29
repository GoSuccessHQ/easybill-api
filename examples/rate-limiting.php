<?php

declare(strict_types=1);

/**
 * Rate limiting: configure the per-minute limit, or plug in a custom limiter.
 */

use GoSuccess\Easybill\Client;
use GoSuccess\Easybill\ClientConfig;
use GoSuccess\Easybill\RateLimit\RateLimiter;
use GoSuccess\Easybill\RateLimit\SlidingWindowRateLimiter;

require __DIR__ . '/../vendor/autoload.php';

$token = (string) getenv('EASYBILL_API_TOKEN');

// 1) Just configure the limit to match your plan (10 or 60). The client throttles
//    proactively so you never hit a 429.
$client = new Client(new ClientConfig(token: $token, requestsPerMinute: 10));

// 2) Or provide your own limiter — e.g. one shared across processes via Redis.
final class RedisRateLimiter implements RateLimiter
{
    public function acquire(): void
    {
        // ... block until a slot is available in your shared store ...
    }
}

$shared = new Client(
    config: new ClientConfig(token: $token),
    rateLimiter: new RedisRateLimiter(),
);

// 3) The default limiter explicitly (sized to requestsPerMinute):
$explicit = new Client(
    config: new ClientConfig(token: $token, requestsPerMinute: 60),
    rateLimiter: new SlidingWindowRateLimiter(maxRequests: 60),
);

echo "Configured rate limiting in three ways.\n";
