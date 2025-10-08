<?php 
namespace App\CarRental;
class Money {
    public function __construct(
        private float $amount,
        private string $currency = 'USD'
    ) {
        if ($amount < 0) {
            throw new \InvalidArgumentException('Amount cannot be negative');
        }
    }
    
    public function getAmount(): float { return $this->amount; }
    public function getCurrency(): string { return $this->currency; }
    
    public function add(Money $other): Money {
        if ($this->currency !== $other->currency) {
            throw new \InvalidArgumentException('Currencies must match');
        }
        return new Money($this->amount + $other->amount, $this->currency);
    }
    
    public function multiply(float $multiplier): Money {
        return new Money($this->amount * $multiplier, $this->currency);
    }
}