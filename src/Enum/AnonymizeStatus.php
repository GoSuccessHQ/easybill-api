<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum AnonymizeStatus: string
{
    case NotAnonymized = 'NOT_ANONYMIZED';
    case Anonymized = 'ANONYMIZED';
}
