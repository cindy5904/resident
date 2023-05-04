<?php

namespace App\Controller;

use App\Entity\CarteProvisoire;
use App\Form\CarteProvisoireType;
use App\Repository\CarteProvisoireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\KnpPaginatorConfig;

class CarteProvisoireController extends AbstractController
{
    
        #[Route('/carte-provisoire', name: 'carte_provisoire.index', methods: ["GET"])]
        public function index(CarteProvisoireRepository $repository, Request $request, PaginatorInterface $paginator): Response
        {
            $carteProvisoires = $paginator->paginate(
                $repository->findAll(),
                $request->query->getInt('page', 1),
                10
        );

            // $CarteProvisoires = $repository->findAll();
            return $this->render('carte_provisoire/index.html.twig', [
                'CarteProvisoires' => $carteProvisoires
            ]);
        }

        #[Route('/carte-provisoire/justif', name: 'carte_provisoire')]
        public function justif(): Response
        {
            return $this->render('carte_provisoire/justif.html.twig');
        }

       



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

            return $this->redirectToRoute("carte_provisoire.index");
        }

        return $this->render("carte_provisoire/new.html.twig", [
            "form" => $form->createView()
        ]);
    }
    #[Route('/carte-provisoire/recherche', name: 'carte_provisoire_recherche')]
    public function rechercheCarteProvisoire(Request $request, EntityManagerInterface $manager)
    {
    $nom = $request->query->get('nom');

    $carteProvisoire = $manager->getRepository(CarteProvisoire::class)->findOneBy(['nom' => $nom]);

    if (!$carteProvisoire) {
        
        return $this->redirectToRoute('carte_provisoire.new');
    }

    
    return $this->render('carte_provisoire/recherche.html.twig', [
        'carte' => $carteProvisoire,
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
}
