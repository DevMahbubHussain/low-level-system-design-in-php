<?php

declare(strict_types=1);

namespace App\Contracts;

interface AuthenticatableInterface
{
    public function login(array $credentials): bool;
    public function logout(): void;
    public function isLoggedIn(): bool;
}
