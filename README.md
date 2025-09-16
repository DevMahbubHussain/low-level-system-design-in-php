
## Low Level System Design using PHP
### Ride-sharing application from scratch using PHP with SOLID principles and design patterns. 


+----------------+       +---------------------+       +-------------------+
|    Passenger   |       |        Ride         |       |      Driver       |
+----------------+       +---------------------+       +-------------------+
| - id: string   |       | - id: string        |       | - id: string      |
| - name: string |       | - passenger:        |       | - name: string    |
| - location:    |       |   Passenger         |       | - location:       |
|   Location     |       | - driver: Driver    |       |   Location        |
| - phone: string|       | - vehicle: Vehicle  |       | - phone: string   |
+----------------+       | - status: RideStatus|       | - isAvailable:    |
| + requestRide()|       | - fare: float       |       |   bool            |
| + cancelRide() |       | - distance: float   |       +-------------------+
| + rateDriver() |       +---------------------+       | + acceptRide()   |
+----------------+       | + calculateFare()   |       | + completeRide() |
                         | + updateStatus()    |       +-------------------+
                         +---------------------+

+----------------+       +---------------------+       +-------------------+
|    Vehicle     |       |   FareCalculator    |       |    Location       |
+----------------+       +---------------------+       +-------------------+
| - id: string   |       | + calculateFare()   |       | - latitude: float |
| - type: string |       +---------------------+       | - longitude: float|
| - driver: Driver|      |          ^                 +-------------------+
| - licensePlate:|       |          |                 | + distanceTo()   |
|   string       |       +----------+----------+      +-------------------+
+----------------+       |                     |
| + getType()    |       | StandardFare       | LuxuryFare       | SharedFare      |
+----------------+       +---------------------+-----------------+-----------------+
         ^               | - baseRate: float  | - luxuryRate:   | - sharedRate:   |
         |               | - perKmRate: float |   float         |   float         |
+--------+--------+      +---------------------+-----------------+-----------------+
|                 |
| Car    |   Bike |
+--------+--------+

+----------------+       +---------------------+
|  RideMatcher   |       |   Notification      |
+----------------+       +---------------------+
| + findDriver() |       | + sendSMS()         |
+----------------+       | + sendPush()        |
                         +---------------------+
