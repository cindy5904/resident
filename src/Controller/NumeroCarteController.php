<?php

namespace App\Controller;

use App\Entity\Residents;
use App\Entity\TravailleurDomicile;
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
        $searchTerm = $request->query->get('numeroCarte');
        $repository = $entityManager->getRepository(Residents::class);
        $residents = $repository->findBy(['numeroCarte' => $searchTerm]);


        return $this->render('numero_carte/index.html.twig', [
            'searchTerm' => $searchTerm,
            'residents' => $residents,
        ]);
    }

    #[Route('/numero/carte/travailleur', name: 'travailleur_carte.search')]
    public function travailleur(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('numeroCarte');
        $repository = $entityManager->getRepository(TravailleurDomicile::class);
        $travailleurs = $repository->findBy(['numeroCarte' => $searchTerm]);

        return $this->render('numero_carte/travailleurSearch.html.twig', [
            'searchTerm' => $searchTerm,
            'travailleurs' => $travailleurs,
        ]);

    }



}

