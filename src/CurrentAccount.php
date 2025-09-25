<?php

declare(strict_types=1);

namespace App;

class CurrentAccount extends BankAccount
{

    public function __construct(string $accountNumber, string $holderName, float  $initialBalance = 0)
    {
        parent::__construct($accountNumber, $holderName, $initialBalance);
    }

    public function getAccountType(): mixed
    {
        return "Current";
    }
    
}
