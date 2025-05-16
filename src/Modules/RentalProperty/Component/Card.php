<?php

namespace App\Modules\RentalProperty\Component;

use App\Modules\RentalProperty\Entity\RentalPropertyEntity;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'RentalProperty:Card', template: 'components/RentalProperty/Card.html.twig')]
class Card
{
    public RentalPropertyEntity $rentalProperty;
}
