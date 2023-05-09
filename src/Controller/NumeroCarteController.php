<?php

namespace App\Controller;

use App\Entity\Residents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NumeroCarteController extends AbstractController
{
    #[Route('/numero/carte', name: 'app_numero_carte')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $numeroCarte = $request->query->get('numeroCarte');

        $repository = $entityManager->getRepository(Residents::class);
        $residents = $repository->findBy(['numeroCarte' => $numeroCarte]);


        return $this->render('numero_carte/index.html.twig', [
            'numeroCarte' => $numeroCarte,
            'residents' => $residents,
        ]);
    }
}

