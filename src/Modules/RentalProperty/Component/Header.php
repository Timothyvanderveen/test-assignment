<?php

namespace App\Modules\RentalProperty\Component;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'RentalProperty:Header', template: 'components/RentalProperty/Header.html.twig')]
class Header
{
    public ?string $location;
    public int $resultCount;
    public int $resultCountTotal;
}
