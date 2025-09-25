<?php

declare(strict_types=1);

namespace App;

class TransactionHistory
{
    private array  $transactions = [];

    public function addTransaction(string $type, float $amount, float $blanaceAfter)
    {
        $this->transactions[]  = [
            'date' => date('Y-m-d H:i:s'),
            'type' => $type,
            'amount' => $amount,
            'balance_after' => $blanaceAfter
        ];
    }

    public function getTransaction()
    {
        return $this->transactions;
    }
}
