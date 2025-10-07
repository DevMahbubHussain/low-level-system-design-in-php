<?php

declare(strict_types=1);

namespace App\Contracts;


interface InventoryServiceInterface
{
    public function isProductAvailable(int $productId, int $quantity): bool;
    public function reserveProduct(int $productId, int $quantity): void;
}
