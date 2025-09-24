<?php 

declare(strict_types=1);
namespace App;

class RideMatcher {
    private array $drivers;

    public function __construct(array $drivers = []) {
        $this->drivers = $drivers;
    }

    public function addDriver(Driver $driver): void {
        $this->drivers[] = $driver;
    }

    public function findNearestDriver(Location $pickupLocation, string $vehicleType): ?Driver {
        $availableDrivers = array_filter($this->drivers, function(Driver $driver) use ($vehicleType) {
            return $driver->isAvailable() && $driver->getVehicle()->getType() === $vehicleType;
        });

        if (empty($availableDrivers)) {
            return null;
        }

        usort($availableDrivers, function(Driver $a, Driver $b) use ($pickupLocation) {
            $distanceA = $pickupLocation->distanceTo($a->getLocation());
            $distanceB = $pickupLocation->distanceTo($b->getLocation());
            return $distanceA <=> $distanceB;
        });

        return $availableDrivers[0];
    }
}