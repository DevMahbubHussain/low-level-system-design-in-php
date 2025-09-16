<?php

declare(strict_types=1);

namespace App;

class LuxuryCar extends Vehicle
{

    public function __construct(string $id, string $licensePlate, Driver $driver)
    {
        parent::__construct($id, 'car', $licensePlate, $driver);
    }

    public function getBaseRate(): float
    {
        return 5.0;
    }
    public function getPerKmRate(): float
    {
        return 3.0;
    }
}
