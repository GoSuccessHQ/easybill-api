<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum PostBoxPostSendType: string
{
    case PostSendTypeStandard = 'post_send_type_standard';
    case PostSendTypeRegistered = 'post_send_type_registered';
    case PostSendTypeRegisteredAndPersonal = 'post_send_type_registered_and_personal';
    case PostSendTypeRegisteredAndReceipt = 'post_send_type_registered_and_receipt';
    case PostSendTypeRegisteredThrowin = 'post_send_type_registered_throwin';
    case PostSendTypePrio = 'post_send_type_prio';
}
