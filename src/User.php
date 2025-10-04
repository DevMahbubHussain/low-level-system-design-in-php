<?php 
namespace App;
abstract class User{
    
    protected string $userId;
    protected string $name;

    public function __construct(string $userId,string $name)
    {
        $this->userId = $userId;
        $this->name = $name;
    }

    public function getuserId(){
        return $this->userId;
    }

    public function getuserName(){
        return $this->name;
    }
}