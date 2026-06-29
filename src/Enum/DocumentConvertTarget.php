<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

/**
 * Target document type when converting an existing document.
 */
enum DocumentConvertTarget: string
{
    case Dunning = 'DUNNING';
    case Reminder = 'REMINDER';
    case ChargeConfirm = 'CHARGE_CONFIRM';
    case Charge = 'CHARGE';
    case Credit = 'CREDIT';
    case Delivery = 'DELIVERY';
    case Invoice = 'INVOICE';
    case Order = 'ORDER';
}
