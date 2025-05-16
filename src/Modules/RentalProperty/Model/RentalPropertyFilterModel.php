<?php

namespace App\Modules\RentalProperty\Model;

class RentalPropertyFilterModel
{
    public function __construct(
        public ?string $city,
        public ?int $priceMin,
        public ?int $priceMax,
    ) {
    }
}
