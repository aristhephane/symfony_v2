<?php

namespace App\Service;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class CheckoutService
{
  private $entityManager;

  public function __construct(EntityManagerInterface $entityManager)
  {
    $this->entityManager = $entityManager;
  }

  public function createOrder($data): Order
  {
    $order = new Order();
    $order->setOrderDate(new \DateTime());
    $order->setStatus(Order::STATUS_PENDING);
    $order->setTotalPrice(19.99); // Exemple

    // Persistance
    $this->entityManager->persist($order);
    $this->entityManager->flush();

    return $order;
  }
}
