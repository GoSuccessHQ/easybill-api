<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

enum PaidDateOption: string
{
    case CreatedDate = 'created_date';
    case DueDate = 'due_date';
    case NextValidDate = 'next_valid_date';
}
