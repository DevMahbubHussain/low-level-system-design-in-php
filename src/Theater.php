<?php

namespace App;

class Theater
{
    private $id;
    private $name;
    private $location;
    private $capacity;

    public function updateShow(): void {}

    public function getShows($showTime)
    {
        return []; // Return array of Show objects
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
}
