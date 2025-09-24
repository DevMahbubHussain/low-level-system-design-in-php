<?php

declare(strict_types=1);

namespace App;

use App\Enum\RideStatus;
use App\FareStrategy\FareCalculationStrategy;

class Ride
{
    private string $id;
    private Passenger $passenger;
    private ?Driver $driver;
    private Vehicle $vehicle;
    private Location $pickupLocation;
    private Location $destination;
    private RideStatus $status;
    private float $fare;
    private float $distance;
    private FareCalculationStrategy $fareStrategy;

    public function __construct(
        string $id,
        Passenger $passenger,
        Location $pickupLocation,
        Location $destination,
        string $vehicleType,
        FareCalculationStrategy $fareStrategy
    ) {
        $this->id = $id;
        $this->passenger = $passenger;
        $this->pickupLocation = $pickupLocation;
        $this->destination = $destination;
        $this->status = RideStatus::PENDING;
        $this->fareStrategy = $fareStrategy;
        $this->distance = $pickupLocation->distanceTo($destination);
        $this->driver = null;
    }

    // Assign Driver 

    public function assignDriver(Driver $driver): void
    {
        $this->driver = $driver;
        $this->vehicle = $driver->getVehicle();
        $this->status = RideStatus::ONGOING;
        $this->calculateFare();
    }

    public function calculateFare(): void
    {
        $this->fare = $this->fareStrategy->calculateFare($this->distance, $this->vehicle);
    }

    public function complete(): void {
        $this->status = RideStatus::COMPLETED;
    }

    public function cancel(): void {
        $this->status = RideStatus::CANCELLED;
    }

    // Getters
    public function getId(): string { return $this->id; }
    public function getPassenger(): Passenger { return $this->passenger; }
    public function getDriver(): ?Driver { return $this->driver; }
    public function getVehicle(): Vehicle { return $this->vehicle; }
    public function getStatus(): RideStatus { return $this->status; }
    public function getFare(): float { return $this->fare; }
    public function getDistance(): float { return $this->distance; }
}
