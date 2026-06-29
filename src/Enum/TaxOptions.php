<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum TaxOptions: string
{
    case NStb = 'nStb';
    case NStbUstId = 'nStbUstID';
    case NStbNoneUstId = 'nStbNoneUstID';
    case NStbIm = 'nStbIm';
    case Revc = 'revc';
    case Ig = 'IG';
    case Al = 'AL';
    case SStfr = 'sStfr';
    case Null = 'NULL';
}
