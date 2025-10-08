<?php

namespace App\CarRental\Users;

abstract class User
{
    public function __construct(

        protected string $name,
        protected string $email,
        protected string $phone,

    ) {}

    // Getters
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }

    public function updateContactInfo(string $email, string $phone): void
    {
        $this->email = $email;
        $this->phone = $phone;
    }
}
