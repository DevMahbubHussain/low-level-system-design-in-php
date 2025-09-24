<?php 
declare(strict_types=1);

namespace App\FareStrategy;

use App\Vehicle;

class StandardFareStrategy implements FareCalculationStrategy{
    public function calculateFare(float $distance, Vehicle $vehicle): float
    {
        return $vehicle->getBaseRate() + ($distance * $vehicle->getPerKmRate());
    }
}