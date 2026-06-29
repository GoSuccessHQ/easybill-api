<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Exception;

use GoSuccess\Easybill\Http\Response;
use RuntimeException;

/**
 * Base class for all errors returned by the easybill API as an HTTP error status.
 *
 * Carries the HTTP status code and the raw response body so callers can inspect
 * the server-provided error details.
 */
class ApiException extends RuntimeException implements EasybillException
{
    public function __construct(
        string $message,
        public readonly int $statusCode,
        public readonly string $responseBody = '',
    ) {
        parent::__construct($message);
    }

    /**
     * Build the most specific exception type for the given error response.
     */
    public static function fromResponse(Response $response): self
    {
        $status = $response->statusCode;
        $body = $response->body;
        $message = self::buildMessage($status, $response->reasonPhrase, $body);

        return match ($status) {
            400 => new BadRequestException($message, $status, $body),
            401 => new AuthenticationException($message, $status, $body),
            404 => new NotFoundException($message, $status, $body),
            406 => new NotAcceptableException($message, $status, $body),
            409 => new ConflictException($message, $status, $body),
            422 => new ValidationException($message, $status, $body),
            429 => new RateLimitException(
                $message,
                $status,
                $body,
                RateLimitException::parseRetryAfter($response->header('Retry-After')),
            ),
            default => new self($message, $status, $body),
        };
    }

    private static function buildMessage(int $status, string $reason, string $body): string
    {
        $message = "easybill API request failed with HTTP {$status}";

        if ($reason !== '') {
            $message .= " {$reason}";
        }

        $detail = self::extractDetail($body);

        if ($detail !== null) {
            $message .= ": {$detail}";
        }

        return $message;
    }

    /**
     * Try to pull a human-readable message out of the JSON error body.
     */
    private static function extractDetail(string $body): ?string
    {
        if ($body === '') {
            return null;
        }

        $decoded = json_decode($body, true);

        if (\is_array($decoded)) {
            foreach (['message', 'error', 'detail'] as $key) {
                if (isset($decoded[$key]) && \is_string($decoded[$key]) && $decoded[$key] !== '') {
                    return $decoded[$key];
                }
            }
        }

        return mb_substr($body, 0, 500);
    }
}
