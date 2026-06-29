<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

/**
 * Whether amounts are calculated from net or gross values.
 */
enum CalcVatFrom: int
{
    case Net = 0;
    case Gross = 1;
}
