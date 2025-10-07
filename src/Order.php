<?php

declare(strict_types=1);

namespace App;

use App\Enums\OrderStatus;
use DateTimeImmutable;

class Order
{
    private \DateTimeImmutable $orderDate;
    private array $statusHistory = [];

    public function __construct(
        private int $id,
        private int $customerId,
        private array $items,
        private OrderStatus $status = OrderStatus::CREATED
    ) {
        $this->orderDate = new DateTimeImmutable();
        $this->addStatusHistory($status);
    }

    public function updateStatus(OrderStatus $newStatus): void
    {
        if ($this->status === OrderStatus::CANCELLED) {
            throw new \InvalidArgumentException('Cannot update status of cancelled order');
        }

        $this->status = $newStatus;
        $this->addStatusHistory($newStatus);
    }

    private function addStatusHistory(OrderStatus $status): void
    {
        $this->statusHistory[] = [
            'status' => $status,
            'timestamp' => new DateTimeImmutable()
        ];
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getCustomerId(): int
    {
        return $this->customerId;
    }
    public function getItems(): array
    {
        return $this->items;
    }
    public function getStatus(): OrderStatus
    {
        return $this->status;
    }
    public function getOrderDate(): \DateTimeImmutable
    {
        return $this->orderDate;
    }
    public function getStatusHistory(): array
    {
        return $this->statusHistory;
    }
}
