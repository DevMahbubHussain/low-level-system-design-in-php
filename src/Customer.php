<?php

declare(strict_types=1);

namespace App;

class Customer
{
    private string $id;
    private string $name;
    private string $accountNo;
    private string $dob;
    private string $address;
    private BankAccount $bankAccount;
    private bool $isLoggedIn = false;

    public function __construct(string $id, string $name, string $accountNo, string $dob, string $address, BankAccount $bankAccount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->accountNo = $accountNo;
        $this->dob = $dob;
        $this->address = $address;
        $this->bankAccount = $bankAccount;
    }

    public function login()
    {
        $this->isLoggedIn = true;
        return "Customer {$this->name} logged in successfully.";
    }

    public function logout()
    {
        $this->isLoggedIn = false;
        return "Customer {$this->name} logged out successfully.";
    }

    public function openAccount(BankAccount $accountNo)
    {
        $this->bankAccount = $accountNo;
        return "Account opened successfully for {$this->name}.";
    }

    public function getAccount()
    {
        return $this->bankAccount;
    }

    public function getInfo()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'account_no' => $this->accountNo,
            'dob' => $this->dob,
            'address' => $this->address
        ];
    }
}
