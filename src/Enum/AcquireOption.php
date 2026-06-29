<?php

declare(strict_types=1);

namespace GoSuccess\Easybill\Enum;

/**
 * How the customer was acquired.
 */
enum AcquireOption: int
{
    /** Referral from another customer. */
    case CustomerReferral = 1;
    /** Newspaper advertisement. */
    case NewspaperAd = 2;
    /** Own acquisition. */
    case OwnAcquisition = 3;
    /** Employee acquisition. */
    case EmployeeAcquisition = 4;
    case Google = 5;
    /** Yellow pages. */
    case YellowPages = 6;
    /** Free internet platform. */
    case FreeInternetPlatform = 7;
    /** Paid internet platform. */
    case PaidInternetPlatform = 8;
}
