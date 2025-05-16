<?php

namespace App\Modules\RentalProperty\Entity;

use App\Modules\Base\Entity\BaseEntityCollection;

/**
 * @extends BaseEntityCollection<RentalPropertyEntity>
 */
class RentalPropertyEntityCollection extends BaseEntityCollection
{
    public static function getEntityClass(): string
    {
        return RentalPropertyEntity::class;
    }

    public static function getDataJsonPath(): ?string
    {
        return '/resources/sample-data/rental-properties.json';
    }

    public function getTotalFree(): int
    {
        return count(array_filter($this->getFilteredData(), function (RentalPropertyEntity $entity): bool {
            return $entity->isHouseTypeFree();
        }));
    }
}
