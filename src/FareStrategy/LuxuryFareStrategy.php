<?php

declare(strict_types=1);

namespace App\FareStrategy;

use App\Vehicle;

class LuxuryFareStrategy implements FareCalculationStrategy
{
    private float $premiumMultiplier;

    public function __construct(float $premiumMultiplier = 1.5)
    {
        $this->premiumMultiplier = $premiumMultiplier;
    }

    public function calculateFare(float $distance, Vehicle $vehicle): float
    {
        $standardFare = $vehicle->getBaseRate() + ($distance * $vehicle->getPerKmRate());
        return $standardFare * $this->premiumMultiplier;
    }
}
