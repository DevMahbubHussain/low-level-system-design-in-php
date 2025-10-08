<?php

namespace App\CarRental\Repositories;

use App\CarRental\Enums\VehicleCategory;
use App\CarRental\Vehicle;

interface VehicleRepositoryInterface
{
    public function findById(string $id): ?Vehicle;
    public function findByCategory(VehicleCategory $cateegory): array;
    public function findAvailableVehicles(): array;
    public function save(Vehicle $vehicle): void;
}
