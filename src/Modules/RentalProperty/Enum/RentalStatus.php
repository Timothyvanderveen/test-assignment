<?php

namespace App\Modules\RentalProperty\Enum;

enum RentalStatus: string
{
    case FOR_RENT = 'forRent';
    case RENTED_OUT = 'rentedOut';
    case UNDER_OPTION = 'underOption';
}
