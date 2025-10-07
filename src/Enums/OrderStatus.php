<?php 
namespace App\Enums;
enum OrderStatus: string {
    case CREATED = 'created';
    case CONFIRMED = 'confirmed';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
}