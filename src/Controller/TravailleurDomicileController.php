<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravailleurDomicileController extends AbstractController
{
    #[Route('/travailleur/domicile', name: 'app_travailleur_domicile')]
    public function index(): Response
    {
        return $this->render('travailleur_domicile/index.html.twig', [
            'controller_name' => 'TravailleurDomicileController',
        ]);
    }
}
