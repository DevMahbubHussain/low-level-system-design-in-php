<?php

namespace App\CarRental\Services;

use App\CarRental\Bill;
use App\CarRental\Charge;
use App\CarRental\Contracts\BillingServiceInterface;
use App\CarRental\Enums\ChargeType;
use App\CarRental\Repositories\VehicleRepositoryInterface;
use App\CarRental\Reservation;

class BillingService implements BillingServiceInterface {
     public function __construct(
        private VehicleRepositoryInterface $vehicleRepository,
    ) {}
        public function createBillForReservation(Reservation $reservation, int $rentalDays): Bill {
        $bill = new Bill(
            'BILL' . $reservation->getReservationNumber(),
            new \DateTimeImmutable()
        );
        
        $vehicle = $this->vehicleRepository->findById($reservation->getVehicleId());
        if ($vehicle) {
            $baseCharge = new Charge(
                'BASE',
                ChargeType::BASE_CHARGE,
                'Base rental charge',
                $vehicle->getDailyRate()->multiply($rentalDays)
            );
            $bill->addCharge($baseCharge);
        }
        
        $reservation->assignBill($bill);
        return $bill;
    }

    public function processPayment(Bill $bill): bool {
        return $bill->processPayment();
    }
}