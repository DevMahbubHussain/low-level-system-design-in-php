<?php

declare(strict_types=1);

namespace App\CarRental\Enums;


enum ReservationStatus: string
{
    case ACTIVE = 'active';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
    case BLACKLISTED = 'blacklisted';
    case BLOCKED = 'blocked';
}
