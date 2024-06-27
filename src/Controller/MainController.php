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
}
