<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum DocumentType: string
{
    case Invoice = 'INVOICE';
    case Recurring = 'RECURRING';
    case Credit = 'CREDIT';
    case Offer = 'OFFER';
    case Reminder = 'REMINDER';
    case Dunning = 'DUNNING';
    case Storno = 'STORNO';
    case StornoCredit = 'STORNO_CREDIT';
    case Delivery = 'DELIVERY';
    case Pdf = 'PDF';
    case Charge = 'CHARGE';
    case ChargeConfirm = 'CHARGE_CONFIRM';
    case Letter = 'LETTER';
    case Order = 'ORDER';
    case ProformaInvoice = 'PROFORMA_INVOICE';
    case StornoProformaInvoice = 'STORNO_PROFORMA_INVOICE';
}
