<?php 
declare(strict_types=1);

namespace App\FareStrategy;

use App\Vehicle;

interface FareCalculationStrategy{
    public function calculateFare(float $distance,Vehicle $vehicle):float;
}