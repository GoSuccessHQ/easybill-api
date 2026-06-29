<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum ProjectStatus: string
{
    case Open = 'OPEN';
    case Done = 'DONE';
    case Cancel = 'CANCEL';
}
