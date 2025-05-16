<?php

namespace App\Modules\RentalProperty\Service;

use App\Modules\Base\Enum\SortDirection;
use App\Modules\RentalProperty\Entity\RentalPropertyEntityCollection;
use App\Modules\RentalProperty\Model\RentalPropertyFilterModel;

class RentalPropertyRepositoryService
{
    public function requestRentalProperties(RentalPropertyFilterModel $filters): RentalPropertyEntityCollection
    {
        return RentalPropertyEntityCollection::createFromJson()
            ->equals('city', $filters->city)
            ->greaterThanOrEquals('price', $filters->priceMin)
            ->lessThanOrEquals('price', $filters->priceMax)
            ->sortBy('price', SortDirection::ASC);
    }
}
