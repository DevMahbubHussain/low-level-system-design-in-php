<?php

declare(strict_types=1);

namespace App\Enum;

enum RideStatus: string
{
    case PENDING = 'pending';
    case ONGOING = 'ongoing';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';
}
