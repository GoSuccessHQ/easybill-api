<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentRecurringSendAs: string
{
    case Email = 'EMAIL';
    case Fax = 'FAX';
    case Post = 'POST';
}
