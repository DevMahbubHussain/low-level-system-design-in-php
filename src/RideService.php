<?php

declare(strict_types=1);

namespace App;

use App\FareStrategy\FareCalculationStrategy;
use App\FareStrategy\StandardFareStrategy;
use App\Notifications\RideNotifier;

class RideService
{

    private RideMatcher $rideMatcher;
    private RideNotifier $rideNotifier;
    private array $rides = [];
    private FareCalculationStrategy $defaultFareStrategy;


    public function __construct(
        RideMatcher $rideMatcher,
        RideNotifier $rideNotifier,
        FareCalculationStrategy $defaultFareStrategy=0
    ) {
        $this->rideMatcher = $rideMatcher;
        $this->rideNotifier = $rideNotifier;
        $this->defaultFareStrategy = $defaultFareStrategy ?? new StandardFareStrategy();
    }

    public function createRide(Passenger $passenger, Location $destination, string $vehicleType): Ride
    {
        $rideId = uniqid('ride_');
        $ride = new Ride($rideId, $passenger, $passenger->getLocation(), $destination, $vehicleType, $this->defaultFareStrategy);
        $this->rides[$rideId] = $ride;
        $this->rideNotifier->notifyRideCreated($ride);

        $driver = $this->rideMatcher->findNearestDriver($passenger->getLocation(), $vehicleType);

        if ($driver) {
            $driver->acceptRide($ride);
            $this->rideNotifier->notifyDriverAssigned($ride);
        }
        return $ride;
    }

    public function completeRide(string $rideId): void
    {
        if (isset($this->rides[$rideId])) {
            $ride = $this->rides[$rideId];
            $ride->getDriver()->completeRide($ride);
            $this->rideNotifier->notifyRideCompleted($ride);
        }
    }
    public function getRide(string $rideId): ?Ride
    {
        return $this->rides[$rideId] ?? null;
    }
}
