<?php

namespace App\Modules\Base\Component;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent(name: 'Base:FilterInputField', template: 'components/Base/FilterInputField.html.twig')]
class BaseFilterInputField
{
    public function __construct(
        protected RequestStack $requestStack,
    ) {
    }

    public string $queryParam;
    public ?string $placeholder = null;

    public function getValue(): ?string
    {
        $request = $this->requestStack->getCurrentRequest();

        if (is_null($request)) {
            return null;
        }

        return ucfirst(strval($request->query->get($this->queryParam)));
    }
}
