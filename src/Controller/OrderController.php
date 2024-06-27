<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
  private $orderRepository;

  public function __construct(OrderRepository $orderRepository)
  {
    $this->orderRepository = $orderRepository;
  }

  #[Route('/orderValidation', name: 'order_validation')]
  public function confirm(int $id): Response
  {
    $order = $this->orderRepository->find($id);

    if (!$order) {
      throw $this->createNotFoundException('The order does not exist');
    }

    return $this->render('order/confirm.html.twig', [
      'order' => $order,
    ]);
  }
}
