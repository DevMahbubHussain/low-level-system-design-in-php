<?php

declare(strict_types=1);

namespace App;

class Bike extends Vehicle
{

    public function __construct(string $id, string $licensePlate, Driver $driver)
    {
        parent::__construct($id, 'bike', $licensePlate, $driver);
    }

    public function getBaseRate(): float
    {
        return 1.0;
    }
    public function getPerKmRate(): float
    {
        return 0.8;
    }
}
