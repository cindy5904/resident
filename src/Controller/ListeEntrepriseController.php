<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeEntrepriseController extends AbstractController
{
    #[Route('/liste/entreprise', name: 'app_liste_entreprise')]
    public function index(): Response
    {
        return $this->render('liste_entreprise/index.html.twig', [
            'controller_name' => 'ListeEntrepriseController',
        ]);
    }
}
