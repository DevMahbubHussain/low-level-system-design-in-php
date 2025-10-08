<?php

namespace App\CarRental\Contracts;

use App\CarRental\Bill;
use App\CarRental\Reservation;

interface BillingServiceInterface
{
    public function createBillForReservation(Reservation $reservation, int $rentalDays): Bill;
    public function processPayment(Bill $bill): bool;
}
