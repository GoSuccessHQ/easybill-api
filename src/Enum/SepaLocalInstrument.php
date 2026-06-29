<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum SepaLocalInstrument: string
{
    case Core = 'CORE';
    case Cor1 = 'COR1';
    case B2B = 'B2B';
}
