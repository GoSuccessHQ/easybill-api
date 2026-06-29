<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum SepaSequenceType: string
{
    case Frst = 'FRST';
    case Ooff = 'OOFF';
    case Fnal = 'FNAL';
    case Rcur = 'RCUR';
}
