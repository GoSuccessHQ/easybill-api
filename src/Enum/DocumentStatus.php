<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentStatus: string
{
    case Accept = 'ACCEPT';
    case Done = 'DONE';
    case Dropshipping = 'DROPSHIPPING';
    case Cancel = 'CANCEL';
}
