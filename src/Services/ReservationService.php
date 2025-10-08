<?php

namespace App\CarRental\Services;

use App\CarRental\Address;
use App\CarRental\Contracts\BillableInterface;
use App\CarRental\Enums\VehicleStatus;
use App\CarRental\Repositories\ReservationRepositoryInterface;
use App\CarRental\Repositories\VehicleRepositoryInterface;
use App\CarRental\Reservation;
use DateTimeImmutable;

class ReservationService
{
    public function __construct(
        private ReservationRepositoryInterface $reservationRepository,
        private VehicleRepositoryInterface $vehicleRepository,
        private BillableInterface $billableInterface,
    ) {}

    public function createReservation(
        string $customerId,
        string $vehicleId,
        DateTimeImmutable $pickupDate,
        DateTimeImmutable $returnDate,
        Address $pickupLocation,
        Address $returnLocation,
    ) {
        $vehicle = $this->vehicleRepository->findById($vehicleId);
        if (!$vehicle || !$vehicle->isAvailable()) {
            return null;
        }

        $reservation = new Reservation(
            $this->generateReservationNumber(),
            $customerId,
            $vehicleId,
            new DateTimeImmutable(),
            DateTimeImmutable::createFromInterface($pickupDate),
            DateTimeImmutable::createFromInterface($returnDate),
            $pickupLocation,
            $returnLocation
        );

        $vehicle->updateStatus(VehicleStatus::RESERVED);
        $this->vehicleRepository->save($vehicle);
        $this->reservationRepository->save($reservation);
        return $reservation;
    }

    public function cancelReservation(string $reservationNumber): bool
    {
        $reservation = $this->reservationRepository->findByReservationNumber($reservationNumber);
        if (!$reservation) {
            return false;
        }

        $success = $reservation->cancelReservation();
        if ($success) {
            $vehicle = $this->vehicleRepository->findById($reservation->getVehicleId());
            if ($vehicle) {
                $vehicle->updateStatus(VehicleStatus::AVAILABLE);
                $this->vehicleRepository->save($vehicle);
            }
            $this->reservationRepository->save($reservation);
        }

        return $success;
    }

    private function generateReservationNumber(): string
    {
        return 'RES' . date('YmdHis') . rand(1000, 9999);
    }
}
