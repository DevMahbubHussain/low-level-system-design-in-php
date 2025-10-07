<?php

declare(strict_types=1);

namespace App\Factories;

use App\Cart;
use App\Order;

class OrderFactory
{
    public static function createFormCart(Cart $cart, int $orderId): Order
    {
        return new Order(
            $orderId,
            $cart->getCustomerId(),
            $cart->getItems(),
        );
    }
}
