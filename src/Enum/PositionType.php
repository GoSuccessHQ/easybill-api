<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum PositionType: string
{
    case Product = 'PRODUCT';
    case Service = 'SERVICE';
    case Text = 'TEXT';
}
