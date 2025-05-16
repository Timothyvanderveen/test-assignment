<?php

namespace App\Modules\RentalProperty\Component;

use App\Modules\RentalProperty\Entity\RentalPropertyEntity;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'RentalProperty:CardList', template: 'components/RentalProperty/CardList.html.twig')]
class CardList
{
    /** @var RentalPropertyEntity[] */
    public array $rentalProperties;
}
