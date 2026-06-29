<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum SepapaymentType: string
{
    case Debit = 'DEBIT';
    case Credit = 'CREDIT';
}
