<?php

declare(strict_types=1);

namespace App;

class Location
{

    private string $latitude;
    private string $longitude;

    public function __construct(string $latitude, string $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }


    public function distanceTo(Location $other):float
    {
        $dx = $this->getLatitude() - $other->getLatitude();
        $dy =  $this->getLongitude() - $other->getLongitude();
        return sqrt($dx * $dx + $dy * $dy);
    }
}
