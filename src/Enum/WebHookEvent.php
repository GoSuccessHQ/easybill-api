<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum WebHookEvent: string
{
    case DocumentCreate = 'document.create';
    case DocumentUpdate = 'document.update';
    case DocumentCompleted = 'document.completed';
    case DocumentDeleted = 'document.deleted';
    case DocumentPaymentAdd = 'document.payment_add';
    case DocumentPaymentDelete = 'document.payment_delete';
    case CustomerCreate = 'customer.create';
    case CustomerUpdate = 'customer.update';
    case CustomerDelete = 'customer.delete';
    case ContactCreate = 'contact.create';
    case ContactUpdate = 'contact.update';
    case ContactDelete = 'contact.delete';
    case PositionCreate = 'position.create';
    case PositionUpdate = 'position.update';
    case PositionDelete = 'position.delete';
    case PostboxCreate = 'postbox.create';
    case PostboxUpdate = 'postbox.update';
    case PostboxDelete = 'postbox.delete';
    case PostboxSent = 'postbox.sent';
}
