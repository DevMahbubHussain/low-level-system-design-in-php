<?php

declare(strict_types=1);

namespace App\FareStrategy;

use App\Vehicle;

class SharedFareStrategy implements FareCalculationStrategy
{
    private float $discountRate;

    public function __construct(float $discountRate = 0.7)
    {
        $this->discountRate = $discountRate;
    }
    public function calculateFare(float $distance, Vehicle $vehicle): float
    {
        $standardFare =  $vehicle->getBaseRate() + ($distance * $vehicle->getPerKmRate());
        return $standardFare * $this->discountRate;
    }
}
