<?php

declare(strict_types=1);

namespace App;

use App\Contracts\AuthenticatableInterface;
use App\Enums\UserRole;

class Customer extends User
{

    public function __construct(
        int $id,
        string $name,
        string $email,
        string $passwordHash,
        private ?Address $address = null,


    ) {
        parent::__construct($id, $name, $email, $passwordHash, UserRole::CUSTOMER);
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function updateAddress(Address $address): void
    {
        $this->address = $address;
    }
}
