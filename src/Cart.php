<?php

declare(strict_types=1);

namespace App;

use App\Contracts\CartOperationsInterface;
use DateTimeImmutable;

class Cart implements CartOperationsInterface
{

    private array $items = [];
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt = null;

    public function __construct(private int $customerId)
    {
        $this->createdAt = new DateTimeImmutable();
    }

    public function addItem(CartItem $item): void
    {
        $productId = $item->getProduct()->getId();

        // Check if item already exists, update quantity if so
        foreach ($this->items as $existingItem) {
            if ($existingItem->getProduct()->getId() === $productId) {
                $newQuantity = $existingItem->getQuantity() + $item->getQuantity();
                $existingItem->updateQuantity($newQuantity);
                $this->updatedAt = new DateTimeImmutable();
                return;
            }
        }
        $this->items[] = $item;
        $this->updatedAt = new DateTimeImmutable();
    }

    public function removeItem(int $productId): void
    {
        $this->items = array_filter(
            $this->items,
            fn($item) => $item->getProduct()->getId() !== $productId
        );
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function updateItemQuantity(int $productId, int $quantity): void
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->getId() === $productId) {
                $item->updateQuantity($quantity);
                $this->updatedAt = new \DateTimeImmutable();
                return;
            }
        }
        throw new \InvalidArgumentException("Product not found in cart");
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function clear(): void
    {
        $this->items = [];
        $this->updatedAt = new \DateTimeImmutable();
    }
}
