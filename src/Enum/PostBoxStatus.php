<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum PostBoxStatus: string
{
    case Waiting = 'WAITING';
    case Prepare = 'PREPARE';
    case Error = 'ERROR';
    case Ok = 'OK';
    case Processing = 'PROCESSING';
}
