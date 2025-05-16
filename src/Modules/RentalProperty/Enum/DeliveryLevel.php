<?php

namespace App\Modules\RentalProperty\Enum;

enum DeliveryLevel: string
{
    case UPHOLSTERED = 'upholstered';
    case FURNISHED = 'furnished';
    case UNKNOWN = 'unknown';
}
