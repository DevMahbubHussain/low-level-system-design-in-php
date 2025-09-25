<?php

declare(strict_types=1);

namespace App;

class Locker
{
    private string  $lockerId;
    private string $size;
    private float $rent;
    private bool $isAvailable;

    public function __construct($lockerId, $size, $rent)
    {
        $this->lockerId = $lockerId;
        $this->size = $size;
        $this->rent = $rent;
        $this->isAvailable = true;
    }

    public function getInfo():array
    {
        return [
            'locker_id' => $this->lockerId,
            'size' => $this->size,
            'rent' => $this->rent,
            'is_available' => $this->isAvailable
        ];
    }

    public function assignLocker():bool
    {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            return true;
        }
        return false;
    }

    public function releaseLocker():void
    {
        $this->isAvailable = true;
    }
}
