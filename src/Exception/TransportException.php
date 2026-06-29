<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Exception;

use RuntimeException;

/**
 * Thrown when the underlying PSR-18 client fails to deliver a request or receive
 * a response (network errors, DNS failures, malformed requests, …).
 */
final class TransportException extends RuntimeException implements EasybillException {}
