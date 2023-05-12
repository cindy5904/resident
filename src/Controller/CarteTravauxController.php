<?php

namespace App\Controller;

use App\Entity\CarteTravaux;
use App\Form\CarteTravauxType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CarteTravauxRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// #[Route('/carte/travaux')]
class CarteTravauxController extends AbstractController
{
    #[Route('/carte-travaux', name: 'carte_travaux.index', methods: ["GET"])]
    public function index(CarteTravauxRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {

        $carteTravaux = $paginator->paginate(
            $repository->findById(),
            $request->query->getInt('page', 1),
            10
    );

        // $CarteProvisoires = $repository->findAll();
        return $this->render('carte_travaux/index.html.twig', [
            'carteTravaux' => $carteTravaux
        ]);
    }


    #[Route('/carte-travaux/creation', name: 'carte_travaux.new', methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $carteTravaux = new CarteTravaux;
        $form = $this->createForm(CarteTravauxType::class, $carteTravaux);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $carteTravaux = $form->getData();
            $manager->persist($carteTravaux);
            $manager->flush();

            $this->addFlash(
                "success",
                "La carte travaux a été créée avec succès !!!"
            );

            return $this->redirectToRoute("carte_travaux.index");
        }

        return $this->render("carte_travaux/new.html.twig", [
            "form" => $form->createView()
        ]);
    }


    #[Route('/carte-travaux/edition/{id}', name: 'carte_travaux.edit', methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, CarteTravaux $carteTravaux): Response
    {

        $form = $this->createForm(CarteTravauxType::class, $carteTravaux);
        $form->handleRequest($request);
        

        if($form->isSubmitted() && $form->isValid()) {
            $carteTravaux = $form->getData();
            $manager->persist($carteTravaux);
            $manager->flush();

            return $this->redirectToRoute("carte_travaux.index");
        }

        return $this->render("carte_travaux/edit.html.twig", [
            "form" => $form->createView(), "carteTravaux" => $carteTravaux
        ]);
    }

    #[Route('/carte-travaux/{id}', name: 'carte_travaux.show', methods: ['GET'])]
    public function show(CarteTravaux $carteTravaux): Response
    {
        return $this->render('carte_travaux/show.html.twig', [
            'carteTravaux' => $carteTravaux,
        ]);
    }

    #[Route('/justif/travaux', name: 'app_justif_travaux')]
    public function justif(): Response
    {
        return $this->render('carte_travaux/justif.html.twig');
    }
}
