<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum BudgetNotifyFrequency: string
{
    case Always = 'ALWAYS';
    case Once = 'ONCE';
    case Never = 'NEVER';
}
