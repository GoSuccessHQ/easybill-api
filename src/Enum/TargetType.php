<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum TargetType: string
{
    case Invoice = 'INVOICE';
    case Credit = 'CREDIT';
    case Order = 'ORDER';
    case Offer = 'OFFER';
}
