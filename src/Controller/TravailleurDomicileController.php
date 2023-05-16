<?php

namespace App\Controller;

use App\Entity\TravailleurDomicile;
use App\Form\RegieTravailleurDomType;
use App\Form\RenouvellementTravailleurDomicileType;
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

    #[Route('/travailleur/domicile/create', name: 'travailleur_domicile.new',  methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $travailleurDoms = new TravailleurDomicile();
        $form = $this->createForm(TravailleurDomType::class, $travailleurDoms);
        $form->handleRequest($request);

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

    #[Route('/travailleur/domicile/edit/{id}', name: 'travailleur_domicile.edit',  methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, TravailleurDomicile $travailleur): Response
    {
        $form = $this->createForm(TravailleurDomType::class, $travailleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $travailleur = $form->getData();
            $manager->persist($travailleur);
            $manager->flush();

            $this->addFlash(
                "success",
                "Le travailleur à domicile a été modifié avec succès !!!"
            );

            return $this->redirectToRoute("travailleur_domicile.index");
        }
        return $this->render("travailleur_domicile/edit.html.twig", [
            "form" => $form->createView(), "travailleur" => $travailleur
        ]);   
    }

    #[Route('/travailleur/domicile/show/{id}', name: 'travailleur_domicile.show')]
    public function show(TravailleurDomicile $travailleur): Response
    {
        return $this->render('travailleur_domicile/show.html.twig', [
            'travailleur' => $travailleur,
        ]);
    }

    #[Route('/travailleur/domicile/regie/{id}', name: 'travailleur_domicile.regie')]
    public function regie(Request $request, EntityManagerInterface $manager, TravailleurDomicile $travailleur): Response
    {
        $form = $this->createForm(RegieTravailleurDomType::class, $travailleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $travailleur = $form->getData();
            $manager->persist($travailleur);
            $manager->flush();


            return $this->redirectToRoute("travailleur_domicile.index");
        }

        return $this->render("travailleur_domicile/regie.html.twig", [
            'form' => $form->createView(), 'travailleur' => $travailleur
        ]);
    }

    #[Route('/travailleur/domicile/search', name: 'travailleur_domicile.searchname')]
    public function searchName(TravailleurDomicileRepository $repository, Request $request): Response
    {
        {
            $searchTerm = $request->query->get('search');
            $travailleurs = null;
        
            if ($searchTerm) {
                $travailleurs = $repository->findBy(['nom' => $searchTerm]);
            }
            return $this->render('travailleur_domicile/searchname.html.twig', [
                'searchTerm' => $searchTerm,
                'travailleurs' => $travailleurs
            ]);
        }
    }

    #[Route('/travailleur/domicile/renouvellement/{id}', name: 'travailleur_domicile.renouvellement')]
    public function renouvellement(Request $request, EntityManagerInterface $manager, TravailleurDomicile $travailleur): Response
    {
        $form = $this->createForm(RenouvellementTravailleurDomicileType::class, $travailleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resident = $form->getData();
            $manager->persist($travailleur);
            $manager->flush();

            $this->addFlash(
                "success",
                "Le travailleur à domicile a été renouvelé avec succès !!!"
            );

            return $this->redirectToRoute("travailleur_domicile.index");
        }

        return $this->render("travailleur_domicile/renouvellement.html.twig", [
            "form" => $form->createView(), "travailleur" => $travailleur
        ]);
    }




}    

