<?php

declare(strict_types=1);

namespace App\CarRental\Enums;


enum VehicleCategory: string
{
    case ECONOMY = 'economy';
    case COMPACT = 'compact';
    case STANDARD = 'standard';
    case LUXURY = 'luxury';
    case SUV = 'suv';
}
