<?php

namespace App\CarRental\Contracts;

use App\CarRental\Enums\VehicleCategory;
use App\CarRental\Enums\VehicleStatus;
use App\CarRental\Repositories\VehicleRepositoryInterface;
use App\CarRental\Vehicle;

class VehicleService implements SearchableInterface
{
    public function __construct(
        private VehicleRepositoryInterface $vehicleRepository
    ) {}

    public function search(string $query): array
    {
        $allVehicles = $this->vehicleRepository->findAvailableVehicles();

        return array_filter($allVehicles, function (Vehicle $vehicle) use ($query) {
            return stripos($vehicle->getMake(), $query) !== false ||
                stripos($vehicle->getModel(), $query) !== false ||
                stripos($vehicle->getDescription() ?? '', $query) !== false;
        });
    }

    public function getVehiclesByCategory(VehicleCategory $category): array
    {
        return $this->vehicleRepository->findByCategory($category);
    }

    public function updateVehicleStatus(string $vehicleId, VehicleStatus $status): bool
    {
        $vehicle = $this->vehicleRepository->findById($vehicleId);
        if (!$vehicle) {
            return false;
        }

        $vehicle->updateStatus($status);
        $this->vehicleRepository->save($vehicle);
        return true;
    }
}
