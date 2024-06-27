<?php

namespace App\Controller;

use App\Repository\DVDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
  private $dvdRepository;

  public function __construct(DVDRepository $dvdRepository)
  {
    $this->dvdRepository = $dvdRepository;
  }

  #[Route('/search', name: 'search')]
  public function search(Request $request): Response
  {
    $query = $request->query->get('q', '');
    $dvds = $this->dvdRepository->searchByTitle($query);

    return $this->render('search/index.html.twig', [
      'dvds' => $dvds,
      'query' => $query,
    ]);
  }
}
