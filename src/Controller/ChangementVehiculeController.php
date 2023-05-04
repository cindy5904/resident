<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangementVehiculeController extends AbstractController
{
    #[Route('/changement/vehicule', name: 'app_changement_vehicule')]
    public function index(): Response
    {
        return $this->render('changement_vehicule/index.html.twig', [
            'controller_name' => 'ChangementVehiculeController',
        ]);
    }
}
