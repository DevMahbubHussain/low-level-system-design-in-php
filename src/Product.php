<?php

declare(strict_types=1);

namespace App;

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private Category $category,
        private int $stockQuantity,
        private bool $isActive = true
    ) {}

    public function updateStock(int $newQuantity): void
    {
        if ($newQuantity < 0) {
            throw new \InvalidArgumentException('Stock quantity cannot be negative');
        }
        $this->stockQuantity = $newQuantity;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getCategory(): Category
    {
        return $this->category;
    }
    public function getStockQuantity(): int
    {
        return $this->stockQuantity;
    }
    public function isActive(): bool
    {
        return $this->isActive;
    }
}
