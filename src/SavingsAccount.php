<?php

declare(strict_types=1);

namespace App;

class SavingsAccount extends BankAccount
{
    private float $interestRate;
    public function __construct(string $accountNumber, string $holderName, float  $initialBalance = 0, float $interestRate = 0.02)
    {
        parent::__construct($accountNumber, $holderName, $initialBalance);
        $this->interestRate = $interestRate;
    }
    public function applyInterest(): void
    {
        $interest = $this->balance * $this->interestRate;
        $this->balance += $interest;
        $this->transactionHistory->addTransaction('interest', $interest, $this->balance);
    }
    public function getAccountType(): mixed
    {
        return "Saving";
    }

    public function getInterestRate(): float
    {
        return $this->interestRate;
    }
}
