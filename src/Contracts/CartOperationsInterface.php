<?php

declare(strict_types=1);

namespace App\Contracts;

use App\CartItem;

interface CartOperationsInterface
{
    public function addItem(CartItem $item): void;
    public function removeItem(int $productId): void;
    public function updateItemQuantity(int $productId, int $quantity): void;
}
