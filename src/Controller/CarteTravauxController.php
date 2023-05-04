<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteTravauxController extends AbstractController
{
    #[Route('/carte/travaux', name: 'app_carte_travaux')]
    public function index(): Response
    {
        return $this->render('carte_travaux/index.html.twig', [
            'controller_name' => 'CarteTravauxController',
        ]);
    }
}
