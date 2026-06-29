<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum ItemType: string
{
    case Product = 'PRODUCT';
    case Service = 'SERVICE';
    case Undefined = 'UNDEFINED';
}
