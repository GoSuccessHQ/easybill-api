<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentRecurringStatus: string
{
    case Running = 'RUNNING';
    case Pause = 'PAUSE';
    case Stop = 'STOP';
    case Waiting = 'WAITING';
}
