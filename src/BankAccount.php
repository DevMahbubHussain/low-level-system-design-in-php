<?php

declare(strict_types=1);

namespace App;

use Exception;

abstract class BankAccount
{

    protected string $accountNumber;
    protected string $holderName;
    protected float $balance;
    protected string $status;
    protected $transactionHistory;

    public function __construct(string $accountNumber, string $holderName, float  $initialBalance = 0)
    {

        $this->accountNumber = $accountNumber;
        $this->holderName = $holderName;
        $this->balance = $initialBalance;
        $this->status = "active";
        $this->transactionHistory =  new TransactionHistory();
        $this->transactionHistory->addTransaction('account_opening', $initialBalance, $initialBalance);
    }

    public function checkBalance(): float
    {
        return $this->balance;
    }

    public function deposite(float $amount): float
    {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be positive");
        }
        $this->balance += $amount;
        $this->transactionHistory->addTransaction('deposite', $amount, $this->balance);
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        if ($amount <= 0) {
            throw new Exception("Withdrawal amount must be positive");
        }
        if ($this->balance < $amount) {
            throw new Exception("Insufficient funds");
        }

        $this->balance -= $amount;
        $this->transactionHistory->addTransaction('withdrawal', $amount, $this->balance);
        return $this->balance;
    }

    public function transfer(BankAccount $toAccount, $amount): void
    {
        $this->withdraw($amount);
        $toAccount->deposite($amount);
        $this->transactionHistory->addTransaction('transfer_out', -$amount, $this->balance);
        $toAccount->transactionHistory->addTransaction('transfer_in', $amount, $toAccount->balance);
    }

    public function getTransactionHistory(): array
    {
        return $this->transactionHistory->getTransaction();
    }

    abstract public function getAccountType(): mixed;
}
