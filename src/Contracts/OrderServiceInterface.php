<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Cart;
use App\Enums\OrderStatus;
use App\Order;

interface OrderServiceInterface
{
    public function createOrder(Cart $cart): Order;
    public function updateOrderStatus(int $orderId, OrderStatus $status): bool;
}
