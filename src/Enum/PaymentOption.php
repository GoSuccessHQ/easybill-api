<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

/**
 * The customer's payment behavior.
 */
enum PaymentOption: int
{
    /** Always pays on time. */
    case AlwaysOnTime = 1;
    /** Mostly pays on time. */
    case MostlyOnTime = 2;
    /** Mostly pays late. */
    case MostlyLate = 3;
    /** Generally pays late. */
    case GenerallyLate = 5;
}
