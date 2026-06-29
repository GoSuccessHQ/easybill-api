<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

/**
 * Channel through which a document can be sent.
 */
enum DocumentSendType: string
{
    case Email = 'email';
    case Fax = 'fax';
    case Post = 'post';
}
