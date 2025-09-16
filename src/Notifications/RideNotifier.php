<?php 
declare(strict_types=1);

namespace App\Notifications;

use App\Ride;

class RideNotifier{
    
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function notifyRideCreated(Ride $ride):void{
        $message = "Your ride has been created. Looking for driver...";
        $this->notificationService->sendNotification($ride->getPassenger(),$message);
    }

      public function notifyDriverAssigned(Ride $ride): void {
        $passengerMessage = "Driver {$ride->getDriver()->getName()} is On The Way";
        $driverMessage  = "You have been assigned to ride # {$ride->getId()}";
        $this->notificationService->sendNotification($ride->getPassenger(),$passengerMessage);
        $this->notificationService->sendNotification($ride->getDriver(),$driverMessage);
      }

       public function notifyRideCompleted(Ride $ride): void {
         $passengerMessage = "Your ride has been completed. Fare : {$ride->getFare()}";
         $driverMessage  = "Ride # {$ride->getId()} completed . You Earned : {$ride->getFare()}";
         $this->notificationService->sendNotification($ride->getPassenger(),$passengerMessage);
         $this->notificationService->sendNotification($ride->getDriver(),$driverMessage);
       }


}