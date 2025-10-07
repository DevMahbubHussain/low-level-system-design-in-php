<?php

declare(strict_types=1);

namespace App\Services;

use App\Cart;
use App\Contracts\InventoryServiceInterface;
use App\Contracts\OrderRepositoryInterface;
use App\Contracts\OrderServiceInterface;
use App\Enums\OrderStatus;
use App\Order;

class OrderService implements OrderServiceInterface
{
    public function __construct(
        private OrderRepositoryInterface $orderRepository,
        private InventoryServiceInterface $inventoryService
    ) {}
    public function createOrder(Cart $cart): Order
    {
        if (empty($cart->getItems())) {
            throw new \InvalidArgumentException('Cannot create order from empty cart');
        }

        // Check inventory
        foreach ($cart->getItems() as $item) {
            if (!$this->inventoryService->isProductAvailable(
                $item->getProduct()->getId(),
                $item->getQuantity()
            )) {
                throw new \RuntimeException('Product not available in required quantity');
            }
        }

        // Create Order 
        $order = new Order(
            $this->orderRepository->getNextId(),
            $cart->getCustomerId(),
            $cart->getItems(),
        );

        // Reserve inventory
        foreach ($cart->getItems() as $item) {
            $this->inventoryService->reserveProduct(
                $item->getProduct()->getId(),
                $item->getQuantity()
            );
        }
        $this->orderRepository->save($order);
        $cart->clear();
        return $order;
    }
    public function updateOrderStatus(int $orderId, OrderStatus $status): bool
    {
        $order = $this->orderRepository->findById($orderId);
        if (!$order) {
            return false;
        }

        $order->updateStatus($status);
        $this->orderRepository->save($order);

        return true;
    }
}
