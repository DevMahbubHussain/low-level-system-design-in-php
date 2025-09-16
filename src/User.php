<?php

declare(strict_types=1);

namespace App;

abstract class User
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $phone,
        protected Location $location,
    ) {}

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getPhone(){
        return $this->phone;
    }
     public function getLocation(): Location {
        return $this->location;
    }
    
}
