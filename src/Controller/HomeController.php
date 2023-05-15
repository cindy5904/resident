<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    #[Route('/justif', name: 'app_justif')]
    public function justif(): Response
    {
        return $this->render('home/justifResident.html.twig');
    }

    #[Route('/choix', name: 'app_choice')]
    public function choice(): Response
    {
        return $this->render('home/choix.html.twig');
    }

    #[Route('/choix/resident', name: 'app_choix_resident')]
    public function choiceResident(): Response
    {
        return $this->render('home/choixResident.html.twig');
    }

    #[Route('/choix/pro', name: 'app_choix_pro')]
    public function choicePro(): Response
    {
        return $this->render('home/choixpro.html.twig');
    }
}