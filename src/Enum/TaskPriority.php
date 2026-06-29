<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum TaskPriority: string
{
    case Low = 'LOW';
    case Normal = 'NORMAL';
    case High = 'HIGH';
}
