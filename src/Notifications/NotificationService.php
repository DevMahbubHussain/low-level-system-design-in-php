<?php 
declare(strict_types=1);

namespace App\Notifications;

use App\User;

interface NotificationService{
    
    public function sendNotification(User $user,string $message):void;
}