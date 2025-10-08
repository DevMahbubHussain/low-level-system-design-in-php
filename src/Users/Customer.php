<?php

namespace App\CarRental\Users;

use App\CarRental\Address;

class Customer extends User
{

    public function __construct(
        string $name,
        string $email,
        string $phone,
        private ?Address $address = null,
        private ?string $driverLicense = null,
        private bool $isVerified = false
    ) {
        parent::__construct($name, $email, $phone);
    }

    //Getters 
    public function getAddress(): ?Address
    {
        return $this->address;
    }
    public function getDriverLicense(): ?string
    {
        return $this->driverLicense;
    }
    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function verify(string $driverLicense): void
    {
        $this->driverLicense = $driverLicense;
        $this->isVerified = true;
    }

    public function updateAddress(Address $address): void
    {
        $this->address = $address;
    }
}
