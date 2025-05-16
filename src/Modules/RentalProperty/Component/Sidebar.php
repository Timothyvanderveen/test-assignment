<?php

namespace App\Modules\RentalProperty\Component;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'RentalProperty:Sidebar', template: 'components/RentalProperty/Sidebar.html.twig')]
class Sidebar
{
    public const RENTAL_COUNT = 300;
}
