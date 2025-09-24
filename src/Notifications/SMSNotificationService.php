<?php 
declare(strict_types=1);

namespace App\Notifications;

use App\User;

class SMSNotificationService implements NotificationService{
    
    public function sendNotification(User $user, string $message): void
    {
        echo "SMS to {$user->getPhone()}: {$message}\n";
    }
}