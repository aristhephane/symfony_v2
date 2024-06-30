<?php

namespace App\Controller;

use App\Service\BasketService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
  private $basketService;

  public function __construct(BasketService $basketService)
  {
    $this->basketService = $basketService;
  }

  #[Route('/basket', name: 'basket')]
  public function show(): Response
  {
    $basket = $this->basketService->getBasket();

    return $this->render('basket/index.html.twig', [
      'basket' => $basket,
    ]);
  }
}
