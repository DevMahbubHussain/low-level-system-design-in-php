<?php 

namespace App\CarRental\Contracts;

use DateTimeInterface;

interface ReservableInterface{
    public function reserve(DateTimeInterface $startDate, DateTimeInterface $endDate): bool;
    public function cancelReservation(): bool;
}