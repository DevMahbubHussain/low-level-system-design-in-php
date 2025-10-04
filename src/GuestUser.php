<?php

namespace App;

class GuestUser extends User
{

    public function __construct(string $userId, string $name)
    {
        parent::__construct($userId, $name);
    }

    public function register($params): void {
      
    }
}
