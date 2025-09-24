<?php

declare(strict_types=1);

namespace App;

class Driver extends User
{

    private bool $isAvailable;
    private Vehicle $vehicle;
    public function __construct(string $id, string $name, string $email, string $phone, Location $location, Vehicle $vehicle)
    {
        parent::__construct($id, $name, $email, $phone, $location);
        $this->isAvailable = true;
        $this->vehicle = $vehicle;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setAvailable(bool $available): void
    {
        $this->isAvailable = $available;
    }

    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    public function acceptRide(Ride $ride): void
    {
        if ($this->isAvailable()) {
            $ride->assignDriver($this);
            $this->setAvailable(false);
        }
    }

    public function completeRide(Ride $ride): void
    {
        if ($ride->getDriver()->getId() == $this->getId()) {
            $ride->complete();
            $this->setAvailable(true);
        }
    }
}
