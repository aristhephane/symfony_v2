<?php

namespace App\Controller;

use App\Repository\DVDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogController extends AbstractController
{
  private $dvdRepository;

  public function __construct(DVDRepository $dvdRepository)
  {
    $this->dvdRepository = $dvdRepository;
  }

  #[Route('/catalog', name: 'catalog')]
  public function index(): Response
  {
    $dvds = $this->dvdRepository->findAll();
    return $this->render('catalog/index.html.twig', [
      'dvds' => $dvds,
    ]);
  }
}
