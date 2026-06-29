<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentRecurringFrequency: string
{
    case Daily = 'DAILY';
    case Weekly = 'WEEKLY';
    case Monthly = 'MONTHLY';
    case Yearly = 'YEARLY';
}
