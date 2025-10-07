<?php

declare(strict_types=1);

namespace App\Services;

use App\Category;
use App\Contracts\ProductRepositoryInterface;

class CatalogService 
{
    public function __construct(
        private ProductRepositoryInterface $productRepository
    ) {}

    public function searchProducts(string $query, ?Category $category = null): array {
        $products = $this->productRepository->findByName($query);
        
        if ($category) {
            $products = array_filter(
                $products, 
                fn($product) => $product->getCategory()->getId() === $category->getId()
            );
        }

        return array_filter($products, fn($product) => $product->isActive());
    }

    public function getProductsByCategory(Category $category): array {
      
        return [];
    }
}
