<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum PriceType: string
{
    case Brutto = 'BRUTTO';
    case Netto = 'NETTO';
}
