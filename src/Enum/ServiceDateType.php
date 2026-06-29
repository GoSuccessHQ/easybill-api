<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum ServiceDateType: string
{
    case Default = 'DEFAULT';
    case Service = 'SERVICE';
    case Delivery = 'DELIVERY';
}
