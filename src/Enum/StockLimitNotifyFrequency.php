<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum StockLimitNotifyFrequency: string
{
    case Always = 'ALWAYS';
    case Once = 'ONCE';
}
