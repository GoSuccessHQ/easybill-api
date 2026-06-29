<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum LoginType: string
{
    case Admin = 'ADMIN';
    case Assistant = 'ASSISTANT';
}
