<?php

namespace App\Controller;

use App\Entity\DVD;
use App\Form\DVDType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDVDController extends AbstractController
{
  #[Route('/admin/addDvd', name: 'admin_add_dvd')]
  public function add(Request $request, EntityManagerInterface $entityManager): Response
  {
    $dvd = new DVD();
    $form = $this->createForm(DVDType::class, $dvd);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->persist($dvd);
      $entityManager->flush();

      return $this->redirectToRoute('admin_add_dvd');
    }

    return $this->render('admin/addDvd.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  #[Route('/admin/editDvd/{id}', name: 'admin_edit_dvd')]
  public function edit(int $id, Request $request, EntityManagerInterface $entityManager): Response
  {
    $dvd = $entityManager->getRepository(DVD::class)->find($id);

    if (!$dvd) {
      throw $this->createNotFoundException('The DVD does not exist');
    }

    $form = $this->createForm(DVDType::class, $dvd);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $entityManager->flush();

      return $this->redirectToRoute('admin_edit_dvd', ['id' => $dvd->getId()]);
    }

    return $this->render('admin/editDvd.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
