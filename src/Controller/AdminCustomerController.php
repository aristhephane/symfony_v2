<?php

namespace App\Controller;

use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCustomerController extends AbstractController
{
  private $customerRepository;

  public function __construct(CustomerRepository $customerRepository)
  {
    $this->customerRepository = $customerRepository;
  }

  #[Route('/admin/customers', name: 'admin_customers')]
  public function index(): Response
  {
    $customers = $this->customerRepository->findAll();
    return $this->render('admin/customers/index.html.twig', [
      'customers' => $customers,
    ]);
  }
  #[Route('/admin/customers/edit/{id}', name: 'admin_customer_edit')]
  public function edit(int $id): Response
  {
    // Logique pour éditer un client
    return $this->render('admin/customers/edit.html.twig', [
      'customerId' => $id,
    ]);
  }
}
