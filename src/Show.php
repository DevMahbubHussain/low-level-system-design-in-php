<?php

namespace App;

class Show
{
    private $id;
    private $showTime;
    private $availableSeats;

    public function bookTicket(Ticket $ticket): Ticket
    {

        return $ticket;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getShowTime()
    {
        return $this->showTime;
    }

    public function getAvailableSeats()
    {
        return $this->availableSeats;
    }

    public function setAvailableSeats($seats): void
    {
        $this->availableSeats = $seats;
    }
}
