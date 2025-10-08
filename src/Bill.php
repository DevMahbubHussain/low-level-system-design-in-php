<?php

namespace App\CarRental;

use App\CarRental\Contracts\BillableInterface;
use App\CarRental\Enums\PaymentStatus;
use DateTimeImmutable;

class Bill implements BillableInterface
{
    private array $charges = [];
    public function __construct(
        private string $id,
        private DateTimeImmutable $issueDate,
        private PaymentStatus $status = PaymentStatus::PENDING
    ) {}

    public function addCharge(Charge $charge): void
    {
        $this->charges[] = $charge;
    }

    public function removeCharge(string $chargeId): void
    {
        $this->charges = array_filter(
            $this->charges,
            fn(Charge $charge) => $charge->getId() !== $chargeId
        );
    }

    public function calculateTotal(): Money
    {
        $total = new Money(0);
        foreach ($this->charges as $charge) {
            $total = $total->add($charge->calculateTotal());
        }
        return $total;
    }

    public function processPayment(): bool
    {
        $this->status = PaymentStatus::COMPLETED;
        return true;
    }

    public function getId(): string
    {
        return $this->id;
    }
    public function getIssueDate(): DateTimeImmutable
    {
        return $this->issueDate;
    }
    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }
    public function getCharges(): array
    {
        return $this->charges;
    }
}
