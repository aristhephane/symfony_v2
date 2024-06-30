<?php

namespace App\Service;

use App\Entity\DVD;
use App\Entity\Film;

class BasketService
{
  public function getBasket()
  {

    $film1 = new Film();
    $film1->setTitle('Inception');
    $film1->setDescription('A mind-bending thriller');

    $film2 = new Film();
    $film2->setTitle('The Matrix');
    $film2->setDescription('A sci-fi classic');

    $dvd1 = new DVD();
    $dvd1->setFilm($film1);
    $dvd1->setReleaseYear(2010);

    $dvd2 = new DVD();
    $dvd2->setFilm($film2);
    $dvd2->setReleaseYear(1999);

    return [
      'items' => [
        ['dvd' => $dvd1, 'quantity' => 2],
        ['dvd' => $dvd2, 'quantity' => 1],
      ],
      'total' => 59.97,
    ];
  }
}
