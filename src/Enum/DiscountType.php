<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DiscountType: string
{
    case Percent = 'PERCENT';
    case Amount = 'AMOUNT';
    case Quantity = 'QUANTITY';
    case Fix = 'FIX';
}
