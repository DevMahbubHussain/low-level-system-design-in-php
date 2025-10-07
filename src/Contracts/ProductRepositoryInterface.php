<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Product;

interface ProductRepositoryInterface
{
  public function findById(int $productId): ?Product;
  public function findByName(string $productName): array;
  public function save(Product $product): void;
  public function delete(Product $product): void;
}
