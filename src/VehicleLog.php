<?php

namespace App\CarRental;

use App\CarRental\Enums\MaintenanceType;
use DateTime;
use DateTimeImmutable;

class VehicleLog
{
    public function __construct(
        private string $id,
        private string $vehicleId,
        private string $description,
        private MaintenanceType $type,
        private DateTimeImmutable $creationDate,
        private DateTimeImmutable $completionDate,

    ) {}

    // Getters 
    public function getId(): string
    {
        return $this->id;
    }
    public function getVehicleId(): string
    {
        return $this->vehicleId;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getType(): MaintenanceType
    {
        return $this->type;
    }
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }
    public function getCompletionDate(): ?DateTimeImmutable
    {
        return $this->completionDate;
    }

    public function complete(): void
    {
        $this->completionDate = new DateTimeImmutable();
    }
    public function updateDescription(string $description): void
    {
        $this->description = $description;
    }
}
