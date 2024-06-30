<?php

namespace App\Controller;

use App\Repository\PromotionRepository;
use App\Repository\DVDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private $promotionRepository;
    private $dvdRepository;

    public function __construct(PromotionRepository $promotionRepository, DVDRepository $dvdRepository)
    {
        $this->promotionRepository = $promotionRepository;
        $this->dvdRepository = $dvdRepository;
    }

    #[Route('/', name: 'home')]
    public function home(): Response
    {
        $promotions = $this->promotionRepository->findAll();
        $newReleases = $this->dvdRepository->findBy([], ['releaseYear' => 'DESC'], 10);

        return $this->render('main/home.html.twig', [
            'promotions' => $promotions,
            'newReleases' => $newReleases,
        ]);
    }

    #[Route('/catalog', name: 'catalog')]
    public function catalog(): Response
    {
        $dvds = $this->dvdRepository->findAll();
        return $this->render('catalog/index.html.twig', [
            'dvds' => $dvds,
        ]);
    }

    #[Route('/account', name: 'account')]
    public function account(): Response
    {
        return $this->render('account/index.html.twig');
    }
    /*
    #[Route('/basket', name: 'basket')]
    public function basket(): Response
    {
        return $this->render('basket/index.html.twig');
    }
*/
}
