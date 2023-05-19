<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\ListeEntrepriseRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeEntrepriseController extends AbstractController
{
    #[Route('/liste/entreprise', name: 'app_liste_entreprise', methods: ["GET"])]
    public function index(ListeEntrepriseRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
           
        
        $listeEntreprises = $paginator->paginate(
            $repository->findById(),
            $request->query->getInt('page', 1),
            10
    );

        return $this->render('liste_entreprise/index.html.twig', [
            'listeEntreprises' => $listeEntreprises,
        ]);
    }

    #[Route('/entreprise/{id}', name: 'liste_entreprise.show', methods: ['GET'])]
    public function show(Entreprise $entreprise): Response
    {
        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
