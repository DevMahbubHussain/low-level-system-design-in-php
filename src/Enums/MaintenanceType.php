<?php

declare(strict_types=1);

namespace App\CarRental\Enums;

enum MaintenanceType: string
{
    case OIL_CHANGE = 'oil_change';
    case REPAIR = 'repair';
    case CLEANING = 'cleaning';
    case OTHER = 'other';
}
