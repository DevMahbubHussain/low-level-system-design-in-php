<?php

declare(strict_types=1);

namespace App;

use App\Contracts\AuthenticatableInterface;
use App\Enums\UserRole;

abstract class User implements AuthenticatableInterface
{

    public function __construct(
        protected int $id,
        protected string $name,
        protected string $email,
        protected string $passwordHash,
        protected UserRole $role,
        protected bool $isActive = true,

    ) {}

    public function login(array $credentials): bool
    {
        $this->isActive = true;
        return true;
    }
    public function logout(): void
    {
        $this->isActive = false;
    }
    public function isLoggedIn(): bool
    {
        return $this->isActive;
    }

    // Getters (immutable)
    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
    public function getRole(): UserRole { return $this->role; }







}
