<?php

declare(strict_types=1);

namespace App;

class Passenger extends User
{

    public function __construct(string $id, string $name, string $email, string $phone,Location $location)
    {
        parent::__construct($id, $name, $email, $phone);
    }

    public function requestRide(Location $destination,string $vehicleType, RideService $rideService):Ride{
        return $rideService->createRide($this, $destination, $vehicleType);
    }

     public function cancelRide(Ride $ride): void{
        if($ride->getPassenger()->getId()== $this->getId()){
          $ride->cancel();
        }
     }
}
