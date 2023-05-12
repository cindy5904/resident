<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionLiberaleController extends AbstractController
{
    #[Route('/profession/liberale', name: 'app_profession_liberale')]
    public function index(): Response
    {
        return $this->render('profession_liberale/index.html.twig', [
            'controller_name' => 'ProfessionLiberaleController',
        ]);
    }
}
