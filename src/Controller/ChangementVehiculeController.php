<?php

namespace App\Controller;

use App\Entity\Residents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangementVehiculeController extends AbstractController
{
    #[Route('/changement/vehicule', name: 'app_changement_vehicule')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $immatriculation = $request->query->get('immatriculation');

        $repository = $entityManager->getRepository(Residents::class);
        $residents = $repository->findBy(['immatriculation' => $immatriculation]);


        return $this->render('changement_vehicule/index.html.twig', [
            'immatriculation' => $immatriculation,
            'residents' => $residents,
        ]);
    }
}

