<?php

declare(strict_types=1);

namespace App;

class Category
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private ?Category $parent = null
    ) {}

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
    public function getParent(): ?Category
    {
        return $this->parent;
    }
}
