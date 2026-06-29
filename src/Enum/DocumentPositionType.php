<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentPositionType: string
{
    case Position = 'POSITION';
    case PositionNocalc = 'POSITION_NOCALC';
    case Text = 'TEXT';
}
