<?php

declare(strict_types=1);

namespace App;

use App\Enums\UserRole;

class Seller extends User
{

    public function __construct(
        int $id,
        string $name,
        string $email,
        string $passwordHash,
        private string $businessName
    ) {
        parent::__construct($id, $name, $email, $passwordHash, UserRole::SELLER);
    }

    public function getBusinessName(): string
    {
        return $this->businessName;
    }
}
