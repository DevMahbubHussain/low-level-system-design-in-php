<?php

namespace App\CarRental;

use App\CarRental\Contracts\VehicleService;
use App\CarRental\Services\BillingService;
use App\CarRental\Services\ReservationService;
use DateTimeInterface;

class CarRentalSystem
{

    public function __construct(
        private VehicleService $vehicleService,
        private ReservationService $reservationService,
        private BillingService $billingService,
    ) {}

    public function getLocation(): Address
    {
        return new Address('123 Main St', 'New York', 'NY', '10001', 'USA');
    }
    public function searchVehicles(string $query): array
    {
        return $this->vehicleService->search($query);
    }

    public function makeReservation(
        string $customerId,
        string $vehicleId,
        DateTimeInterface $pickupDate,
        DateTimeInterface $returnDate,
        Address $pickupLocation,
        Address $returnLocation
    ): ?Reservation {
        return $this->reservationService->createReservation(
            $customerId,
            $vehicleId,
            $pickupDate,
            $returnDate,
            $pickupLocation,
            $returnLocation
        );
    }
}
