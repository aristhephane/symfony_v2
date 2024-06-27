<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation;
use Symfony\Component\Security\Core\Security;

class AccountController extends AbstractController
{
  private $orderRepository;
  private $security;

  public function __construct(OrderRepository $orderRepository, Security $security)
  {
    $this->orderRepository = $orderRepository;
    $this->security = $security;
  }

  #[Route('/account', name: 'account')]
  public function index(): Response
  {
    $user = $this->security->getUser();
    $orders = $this->orderRepository->findBy(['customerId' => $user->getId()]);

    return $this->render('account/index.html.twig', [
      'user' => $user,
      'orders' => $orders,
    ]);
  }
}
