<?php 

namespace App\CarRental\Contracts;

use App\CarRental\Money;

interface BillableInterface{
    public function calculateTotal():Money;
    public function processPayment(): bool;
}