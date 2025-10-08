<?php

declare(strict_types=1);

namespace App\CarRental\Enums;

enum ChargeType: string
{
    case BASE_CHARGE = 'base_charge';
    case ADDITIONAL_SERVICE = 'additional_service';
    case FINE = 'fine';
    case OTHER = 'other';
}
