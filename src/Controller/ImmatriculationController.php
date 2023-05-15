<?php

namespace App\Controller;

use App\Entity\Residents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImmatriculationController extends AbstractController
{
    #[Route('/immatriculation', name: 'app_immatriculation')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $searchTerm = $request->query->get('immatriculation');

        $repository = $manager->getRepository(Residents::class);
        $residents = $repository->findBy(['immatriculation' => $searchTerm]);


        return $this->render('immatriculation/index.html.twig', [
            'searchTerm' => $searchTerm,
            'residents' => $residents,
        ]);
    }
}
