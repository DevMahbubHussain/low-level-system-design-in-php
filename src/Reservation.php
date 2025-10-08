<?php

namespace App\CarRental;

use App\CarRental\Enums\ReservationStatus;
use DateTimeImmutable;
use DateTimeInterface;

class Reservation
{
    private ReservationStatus $status;
    private ?Bill $bill = null;
    public function __construct(
        private string $reservationNumber,
        private string $customerId,
        private string $vehicleId,
        private DateTimeImmutable $creationDate,
        private DateTimeImmutable $pickupDate,
        private DateTimeImmutable $returnDate,
        private Address  $pickupLocation,
        private Address  $returnLocation,

    ) {
        $this->status = ReservationStatus::ACTIVE;
        $this->creationDate = new DateTimeImmutable();
    }

    public function reserve(DateTimeImmutable $startDate, DateTimeImmutable $endDate): bool
    {
        if ($this->status != ReservationStatus::ACTIVE) {
            return false;
        }
        $this->pickupDate = DateTimeImmutable::createFromInterface($startDate);
        $this->returnDate  = DateTimeImmutable::createFromInterface($endDate);
        return true;
    }

    public function cancelReservation(): bool
    {
        if ($this->status === ReservationStatus::CANCELLED) {
            return false;
        }

        $this->status = ReservationStatus::CANCELLED;
        return true;
    }

    public function complete(?DateTimeInterface $actualReturnDate = null): void
    {
        $this->status = ReservationStatus::CLOSED;
        if ($actualReturnDate) {
            $this->returnDate = DateTimeImmutable::createFromInterface($actualReturnDate);
        }
    }

    public function assignBill(Bill $bill): void
    {
        $this->bill = $bill;
    }

    // Getters
    public function getReservationNumber(): string
    {
        return $this->reservationNumber;
    }
    public function getCustomerId(): string
    {
        return $this->customerId;
    }
    public function getVehicleId(): string
    {
        return $this->vehicleId;
    }
    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }
    public function getPickupDate(): DateTimeImmutable
    {
        return $this->pickupDate;
    }
    public function getReturnDate(): DateTimeImmutable
    {
        return $this->returnDate;
    }
    public function getPickupLocation(): Address
    {
        return $this->pickupLocation;
    }
    public function getReturnLocation(): Address
    {
        return $this->returnLocation;
    }
    public function getStatus(): ReservationStatus
    {
        return $this->status;
    }
    public function getBill(): ?Bill
    {
        return $this->bill;
    }
}
