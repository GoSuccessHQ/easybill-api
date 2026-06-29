<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum ContentType: string
{
    case Form = 'form';
    case Json = 'json';
}
