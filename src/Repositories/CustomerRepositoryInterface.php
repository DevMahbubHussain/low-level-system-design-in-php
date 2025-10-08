<?php

namespace App\CarRental\Repositories;

use App\CarRental\Users\Customer;

interface CustomerRepositoryInterface{
    public function findById(string $id): ?Customer;
    public function findByEmail(string $email): ?Customer;
    public function save(Customer $customer): void;
}