<?php

declare(strict_types=1);

namespace App;

class CartItem
{
    public function __construct(
        private Product $product,
        private int $quantity
    ) {
        if ($quantity <= 0) {
            throw new \InvalidArgumentException('Quantity must be positive');
        }
    }

    public function updateQuantity(int $newQuantity): void
    {
        if ($newQuantity <= 0) {
            throw new \InvalidArgumentException('Quantity must be positive');
        }
        $this->quantity = $newQuantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
