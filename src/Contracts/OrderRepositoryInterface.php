<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Order;

interface OrderRepositoryInterface
{
    public function findById(int $orderId): ?Order;
    public function save(Order $order): void;
    public function getNextId(): int;
}
