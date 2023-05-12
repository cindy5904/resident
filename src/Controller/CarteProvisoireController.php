<?php

namespace App\Controller;

use App\Entity\CarteProvisoire;
use App\Form\CarteProvisoireType;
use App\Repository\CarteProvisoireRepository;
use Doctrine\DBAL\Query\QueryBuilder as QueryQueryBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\KnpPaginatorConfig;

class CarteProvisoireController extends AbstractController
{
    
        #[Route('/carte-provisoire', name: 'carte_provisoire.index', methods: ["GET"])]
        public function index(CarteProvisoireRepository $repository, Request $request, PaginatorInterface $paginator): Response
        {

            $carteProvisoires = $paginator->paginate(
                $repository->findById(),
                $request->query->getInt('page', 1),
                10
        );
        
    
            
            return $this->render('carte_provisoire/index.html.twig', [
                'CarteProvisoires' => $carteProvisoires,
                
            ]);
        }
        #[Route('/carte-provisoire/recherche', name: 'carte_provisoire_recherche')]
        public function rechercheCarteProvisoire(Request $request, EntityManagerInterface $manager, CarteProvisoireRepository $repository)
        {
            $searchTerm = $request->query->get('nom');
            $repository = $manager->getRepository(CarteProvisoire::class);
            $cartes = $repository->findBy(['nom' => $searchTerm]);


            return $this->render('carte_provisoire/recherche.html.twig', [
                'searchTerm' => $searchTerm,
                'cartes' => $cartes,
            ]);
        }

        #[Route('/carte-provisoire/justif', name: 'carte_provisoire')]
        public function justif(): Response
        {
            return $this->render('carte_provisoire/justif.html.twig');
        }

        // public function onKernelController(ControllerEvent $event)
        // {
        //     $request = $event->getRequest();
        //     // Si la route correspond à celle de l'index des cartes provisoires
        //     if ($request->attributes->get('_route') === 'carte_provisoire.index') {
        //         $queryBuilder = $this->getDoctrine()->getRepository(CarteProvisoire::class)->createQueryBuilder('c');

        //         // Récupération du filtre sur le nom (si présent)
        //         $nomFilter = $request->query->get('nomFilter');
        //         if ($nomFilter) {
        //             $queryBuilder->andWhere('c.nom LIKE :nomFilter')
        //                 ->setParameter('nomFilter', '%' . $nomFilter . '%');
        //         }

        //         // Mise à jour de la requête
        //         $request->query->set('nomFilter', $nomFilter);
        //         $request->attributes->set('doctrine.orm.query_builder', $queryBuilder);
        //     }
        // }
       



    #[Route('/carte-provisoire/creation', name: 'carte_provisoire.new', methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $carteProvisoire = new CarteProvisoire;
        $form = $this->createForm(CarteProvisoireType::class, $carteProvisoire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $carteProvisoire = $form->getData();
            $manager->persist($carteProvisoire);
            $manager->flush();

            $this->addFlash(
                "success",
                "La carte provisoire a été créée avec succès !!!"
            );

            return $this->redirectToRoute("carte_provisoire.index");
        }

        return $this->render("carte_provisoire/new.html.twig", [
            "form" => $form->createView()
        ]);
    }


    #[Route('/carte-provisoire/edition/{id}', name: 'carte_provisoire.edit', methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, CarteProvisoire $carteProvisoire): Response
    {
        $form = $this->createForm(CarteProvisoireType::class, $carteProvisoire);
        $form->handleRequest($request);
        

        if($form->isSubmitted() && $form->isValid()) {
            $carteProvisoire = $form->getData();
            $manager->persist($carteProvisoire);
            $manager->flush();

            return $this->redirectToRoute("carte_provisoire.index");
        }

        return $this->render("carte_provisoire/edit.html.twig", [
            "form" => $form->createView(), "carteProvisoire" => $carteProvisoire
        ]);
    }

    #[Route('/carte-provisoire/{id}', name: 'carte_provisoire.show', methods: ['GET'])]
    public function show(CarteProvisoire $carteProvisoire): Response
    {
        return $this->render('carte_provisoire/show.html.twig', [
            'carteProvisoire' => $carteProvisoire,
        ]);
    }

    #[Route('/carte-provisoire/search', name: 'carte_provisoire_search')]
    public function rechercheCarte(Request $request, EntityManagerInterface $manager)
    {
    $nom = $request->query->get('nom');

    $carteProvisoire = $manager->getRepository(CarteProvisoire::class)->findOneBy(['nom' => $nom]);

    if (!$carteProvisoire) {
        
        return $this->redirectToRoute('carte_provisoire.new');
    }

    
    return $this->render('carte_provisoire/searchName.html.twig', [
        'carte' => $carteProvisoire,
    ]);
    }
}
