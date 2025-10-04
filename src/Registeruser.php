<?php

namespace App;

class Registeruser extends User
{
    protected $bookingHistory;
    public function __construct(string $userId, string $name,string $bookingHistory )
    {
        parent::__construct($userId, $name);
        $this->bookingHistory = $bookingHistory;
    }

    public function login($params): void {
        // Implementation for user login
    }
    public function getBookingHistory(){
        return $this->bookingHistory;
    }
    


}
