<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Tests\Support;

use GoSuccess\Easybill\Exception\TransportException;
use GoSuccess\Easybill\Http\HttpClient;
use GoSuccess\Easybill\Http\Request;
use GoSuccess\Easybill\Http\Response;
use RuntimeException;

/**
 * Test double that returns a queue of predefined responses (or throws predefined
 * exceptions) and records every request it received.
 */
final class MockHttpClient implements HttpClient
{
    /** @var list<Response|TransportException> */
    private array $queue;

    /** @var list<Request> */
    public array $requests = [];

    public function __construct(Response|TransportException ...$queue)
    {
        $this->queue = array_values($queue);
    }

    public function send(Request $request): Response
    {
        $this->requests[] = $request;

        $next = array_shift($this->queue);

        if ($next === null) {
            throw new RuntimeException('MockHttpClient ran out of queued responses.');
        }

        if ($next instanceof TransportException) {
            throw $next;
        }

        return $next;
    }

    public function callCount(): int
    {
        return \count($this->requests);
    }
}
