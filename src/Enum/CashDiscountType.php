<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum CashDiscountType: string
{
    case Percent = 'PERCENT';
    case Amount = 'AMOUNT';
}
