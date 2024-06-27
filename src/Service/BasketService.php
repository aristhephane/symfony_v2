<?php

namespace App\Service;

class BasketService
{
  public function getBasket()
  {
    return [
      'items' => [
        ['dvd' => 'Inception', 'quantity' => 2],
        ['dvd' => 'The Matrix', 'quantity' => 1]
      ],
      'total' => 59.97
    ];
  }
}
