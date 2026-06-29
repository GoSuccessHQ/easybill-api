<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Exception;

use RuntimeException;

/**
 * Thrown when a request payload cannot be encoded or a response body cannot be
 * decoded/mapped into the expected shape.
 */
final class SerializationException extends RuntimeException implements EasybillException {}
