<?php

declare(strict_types=1);

namespace App\CarRental\Enums;

enum VehicleStatus: string
{
    case AVAILABLE = 'available';
    case RENTED = 'rented';
    case MAINTENANCE = 'maintenance';
    case RESERVED = 'reserved';
}
