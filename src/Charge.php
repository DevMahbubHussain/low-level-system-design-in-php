<?php

namespace App\CarRental;

use App\CarRental\Contracts\BillableInterface;
use App\CarRental\Enums\ChargeType;

class Charge implements BillableInterface
{
    public function __construct(
        private string $id,
        private ChargeType $type,
        private string $description,
        private Money $amount
    ) {}

    public function calculateTotal(): Money
    {
        return $this->amount;
    }

    public function processPayment(): bool
    {
        return true;
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function getType(): ChargeType
    {
        return $this->type;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function updateAmount(Money $newAmount): void
    {
        $this->amount = $newAmount;
    }
}
