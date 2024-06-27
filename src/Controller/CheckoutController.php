<?php

namespace App\Controller;

use App\Form\CheckoutType;
use App\Service\CheckoutService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
  private $checkoutService;

  public function __construct(CheckoutService $checkoutService)
  {
    $this->checkoutService = $checkoutService;
  }

  #[Route('/checkout', name: 'checkout')]
  public function index(Request $request): Response
  {
    $form = $this->createForm(CheckoutType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $order = $this->checkoutService->createOrder($form->getData());
      return $this->redirectToRoute('order_validation', ['id' => $order->getId()]);
    }

    return $this->render('checkout/index.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
