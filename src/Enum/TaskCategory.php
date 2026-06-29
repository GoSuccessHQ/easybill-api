<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum TaskCategory: string
{
    case Call = 'CALL';
    case Email = 'EMAIL';
    case Fax = 'FAX';
    case Lunch = 'LUNCH';
    case Meeting = 'MEETING';
    case Travel = 'TRAVEL';
    case Custom = 'CUSTOM';
}
