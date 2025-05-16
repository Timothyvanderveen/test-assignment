<?php

namespace App\Modules\RentalProperty\Controller;

use App\Modules\RentalProperty\Model\RentalPropertyFilterModel;
use App\Modules\RentalProperty\Service\RentalPropertyRepositoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

class RentalPropertiesWebController extends AbstractController
{
    public function __construct(public RentalPropertyRepositoryService $rentalPropertyRepositoryService)
    {
    }

    #[Route('appartement/huren', methods: ['GET'])]
    public function results(
        #[MapQueryString] RentalPropertyFilterModel $queryParams,
    ): Response {
        $rentalPropertyCollection = $this->rentalPropertyRepositoryService->requestRentalProperties($queryParams);

        return $this->render('web/rental_properties.html.twig', [
            'rentalProperties' => $rentalPropertyCollection->getFilteredData(),
            'location' => $queryParams->city ?? null,
            'resultCount' => $rentalPropertyCollection->getTotalFree(),
            'resultCountTotal' => $rentalPropertyCollection->getTotal(),
        ]);
    }
}
