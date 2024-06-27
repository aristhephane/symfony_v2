<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminReportController extends AbstractController
{
  #[Route('/admin/reports', name: 'admin_reports')]
  public function index(): Response
  {
    // Fetch report data
    return $this->render('admin/reports/index.html.twig', [
      // Add necessary data here
    ]);
  }
}
