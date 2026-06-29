<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

/**
 * Form of address for a customer or contact.
 */
enum Salutation: int
{
    case Nothing = 0;
    case Mr = 1;
    case Mrs = 2;
    case Company = 3;
    case MrAndMrs = 4;
    case MarriedCouple = 5;
    case Family = 6;
}
