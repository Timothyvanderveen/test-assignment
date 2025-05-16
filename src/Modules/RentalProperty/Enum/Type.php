<?php

namespace App\Modules\RentalProperty\Enum;

enum Type: string
{
    case RESIDENTIAL_HOUSE = 'residentialHouse';
    case APARTMENT = 'apartment';
    case STUDIO = 'studio';
}
