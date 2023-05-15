<?php

namespace App\Controller;

use App\Entity\TravailleurDomicile;
use App\Form\TravailleurDomType;
use App\Repository\TravailleurDomicileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravailleurDomicileController extends AbstractController
{
    #[Route('/travailleur/domicile', name: 'travailleur_domicile.index', methods: ["GET"])]
    public function index(TravailleurDomicileRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
        $travailleursDoms = $paginator->paginate(
            $repository->findById(),
            $request->query->getInt('page', 1),
            10
    );
    

        
        return $this->render('travailleur_domicile/index.html.twig', [
            'travailleursDoms' => $travailleursDoms,
            
        ]);
    }

    #[Route('/travailleur/domicile/create', name: 'travailleur_domicile.new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $travailleurDoms = new TravailleurDomicile();
        $form = $this->createForm(TravailleurDomType::class, $travailleurDoms);

        if($form->isSubmitted() && $form->isValid()) {
            $travailleurDoms = $form->getData();
            $manager->persist($travailleurDoms);
            $manager->flush();

            $this->addFlash(
                "success",
                "La carte travailleur à domicile a été créée avec succès !!!"
            );

            return $this->redirectToRoute("travailleur_domicile.index");
        }

        return $this->render('travailleur_domicile/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

        
}

