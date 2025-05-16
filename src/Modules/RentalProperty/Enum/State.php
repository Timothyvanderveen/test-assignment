<?php

namespace App\Modules\RentalProperty\Enum;

enum State: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
