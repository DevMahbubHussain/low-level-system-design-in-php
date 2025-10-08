<?php

namespace App\CarRental\Repositories;

use App\CarRental\Reservation;

interface ReservationRepositoryInterface{
    public function findByReservationNumber(string $reservationNumber): ?Reservation;
    public function findActiveReservations(): array;
    public function save(Reservation $reservation): void;
}