<?php

namespace App;

class Ticket
{
    private $id;
    private $bookedDateTime;
    private $header;
    private $numberOfSeats;


    public function getTicketInfo(): Ticket
    {
        return $this;
    }

    public function cancelTicket(): int
    {
        return 1;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getBookedDateTime()
    {
        return $this->bookedDateTime;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getNumberOfSeats()
    {
        return $this->numberOfSeats;
    }
}
