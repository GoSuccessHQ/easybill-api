<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Http;

/**
 * HTTP methods used by the easybill API.
 */
enum Method: string
{
    case Get = 'GET';
    case Post = 'POST';
    case Put = 'PUT';
    case Delete = 'DELETE';
}
