<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum SepaAgreement: string
{
    case Basic = 'BASIC';
    case Cor1 = 'COR1';
    case Company = 'COMPANY';
    case Null = 'NULL';
}
