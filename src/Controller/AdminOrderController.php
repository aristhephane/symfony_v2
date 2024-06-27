<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminOrderController extends AbstractController
{
  private $orderRepository;

  public function __construct(OrderRepository $orderRepository)
  {
    $this->orderRepository = $orderRepository;
  }

  #[Route('/admin/orders', name: 'admin_orders')]
  public function index(): Response
  {
    $orders = $this->orderRepository->findAll();
    return $this->render('admin/orders/index.html.twig', [
      'orders' => $orders,
    ]);
  }
}
