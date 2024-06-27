<?php

namespace App\Controller;

use App\Repository\DVDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DVDController extends AbstractController
{
  private $dvdRepository;

  public function __construct(DVDRepository $dvdRepository)
  {
    $this->dvdRepository = $dvdRepository;
  }

  #[Route('/dvd/{id}', name: 'dvd_show')]
  public function show(int $id): Response
  {
    $dvd = $this->dvdRepository->find($id);

    if (!$dvd) {
      throw $this->createNotFoundException('The DVD does not exist');
    }

    return $this->render('dvd/show.html.twig', [
      'dvd' => $dvd,
    ]);
  }
}
