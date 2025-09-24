<?php

use App\Bike;
use App\Car;
use App\Driver;
use App\Location;
use App\Notifications\RideNotifier;
use App\Notifications\SMSNotificationService;
use App\Passenger;
use App\RideMatcher;
use App\RideService;

require_once './vendor/autoload.php';

// Notification 
$notificationService = new SMSNotificationService();
$rideNotifier = new RideNotifier($notificationService);


$driver1Location = new Location(40.7128, -74.0060);
$driver1 = new Driver('driver_1', 'John Doe','john@gmail.com', '123-456-7890', $driver1Location, $driver1Car);
$driver1Car = new Car('car_1', 'ABC123', $driver1);


$driver2Location = new Location(40.7130, -74.0062);
$driver2 = new Driver('driver_2', 'Jane Smith','smith@gmail.com', '098-765-4321', $driver2Location, $driver2Bike);
$driver2Bike = new Bike('bike_1', 'XYZ789', $driver2);



// Create ride matcher and add drivers
$rideMatcher = new RideMatcher([$driver1, $driver2]);

// Create ride service
$rideService = new RideService($rideMatcher, $rideNotifier);

// Create passenger
$passengerLocation = new Location(40.7125, -74.0063);
$passenger = new Passenger('passenger_1', 'Alice Johnson','Alice@gmail.com','555-1234', $passengerLocation);

// Request a ride
$destination = new Location(40.7200, -74.0100);
$ride = $passenger->requestRide($destination, 'car', $rideService);

// Complete the ride
$rideService->completeRide($ride->getId());