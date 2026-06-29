<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Exception;

/**
 * Authentication failed: the API key is missing or invalid (HTTP 401).
 */
final class AuthenticationException extends ApiException {}
