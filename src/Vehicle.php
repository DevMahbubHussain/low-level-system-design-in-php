<?php

namespace App\CarRental;

use App\CarRental\Enums\VehicleCategory;
use App\CarRental\Enums\VehicleStatus;

class Vehicle
{

    public function __construct(
        private string $id,
        private string $licensePlate,
        private string $make,
        private string $model,
        private int $year,
        private VehicleCategory $category,
        private VehicleStatus $status = VehicleStatus::AVAILABLE,
        private Money $dailyRate,
        private ?string $description = null,
    ) {}


    public function getId(): string
    {
        return $this->id;
    }
    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }
    public function getMake(): string
    {
        return $this->make;
    }
    public function getModel(): string
    {
        return $this->model;
    }
    public function getYear(): int
    {
        return $this->year;
    }
    public function getCategory(): VehicleCategory
    {
        return $this->category;
    }
    public function getDailyRate(): Money
    {
        return $this->dailyRate;
    }
    public function getStatus(): VehicleStatus
    {
        return $this->status;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function updateStatus(VehicleStatus $status): void
    {
        $this->status = $status;
    }

    public function updatePricing(Money $newDailyRate): void
    {
        $this->dailyRate = $newDailyRate;
    }

    public function isAvailable(): bool
    {
        return $this->status === VehicleStatus::AVAILABLE;
    }
}
