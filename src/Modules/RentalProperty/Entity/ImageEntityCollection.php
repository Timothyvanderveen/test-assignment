<?php

namespace App\Modules\RentalProperty\Entity;

use App\Modules\Base\Entity\BaseEntityCollection;

/**
 * @extends BaseEntityCollection<ImageEntity>
 */
class ImageEntityCollection extends BaseEntityCollection
{
    public static function getEntityClass(): string
    {
        return ImageEntity::class;
    }
}
