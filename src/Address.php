<?php 

namespace App\CarRental;
class Address {
    public function __construct(
        private string $street,
        private string $city,
        private string $state,
        private string $zipCode,
        private string $country
    ) {}
    
    public function getStreet(): string { return $this->street; }
    public function getCity(): string { return $this->city; }
    public function getState(): string { return $this->state; }
    public function getZipCode(): string { return $this->zipCode; }
    public function getCountry(): string { return $this->country; }
    
    public function __toString(): string {
        return "{$this->street}, {$this->city}, {$this->state} {$this->zipCode}, {$this->country}";
    }
}