<?php

declare(strict_types=1);

namespace App;

abstract class Vehicle
{
    public function __construct(
        protected string $id,
        protected string $type,
        protected string $licensePlate,
        protected Driver $driver
    ) {}


    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    public function getDriver(): Driver
    {
        return $this->driver;
    }

    abstract public function getBaseRate(): float;
    abstract public function getPerKmRate(): float;
}
