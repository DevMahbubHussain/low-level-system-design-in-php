<?php

declare(strict_types=1);

namespace App;

class Car extends Vehicle
{

    public function __construct(string $id, string $licensePlate, Driver $driver)
    {
        parent::__construct($id, 'car', $licensePlate, $driver);
    }

    public function getBaseRate(): float
    {
        return 2.5;
    }
    public function getPerKmRate(): float
    {
        return 1.5;
    }
}
