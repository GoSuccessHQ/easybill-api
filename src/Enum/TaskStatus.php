<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum TaskStatus: string
{
    case Waiting = 'WAITING';
    case Processing = 'PROCESSING';
    case Done = 'DONE';
    case Cancel = 'CANCEL';
}
