<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum PaymentProviderMandateStatus: string
{
    case Valid = 'valid';
    case Pending = 'pending';
    case Invalid = 'invalid';
    case Revoking = 'revoking';
}
