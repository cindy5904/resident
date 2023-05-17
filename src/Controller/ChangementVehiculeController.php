<?php

namespace App\Controller;

use App\Entity\ProfessionLiberale;
use App\Entity\Residents;
use App\Entity\TravailleurDomicile;
use App\Form\ChangementVehiculeProfessionType;
use App\Form\ChangementVehiculeTravailleurdomType;
use App\Form\ChangementVehiculeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChangementVehiculeController extends AbstractController
{
    #[Route('/changement/vehicule', name: 'app_changement_vehicule')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('immatriculation');

        $repository = $entityManager->getRepository(Residents::class);
        $residents = $repository->findBy(['immatriculation' => $searchTerm]);


        return $this->render('changement_vehicule/index.html.twig', [
            'searchTerm' => $searchTerm,
            'residents' => $residents,
        ]);
    }

    #[Route('/changement/vehicule/edit/{id}', name: 'app_vehicule_edit')]
    public function edit(Request $request, EntityManagerInterface $manager, Residents $resident): Response
    {
        $form = $this->createForm(ChangementVehiculeType::class, $resident);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $resident = $form->getData();
            $manager->persist($resident);
            $manager->flush();

            $this->addFlash(
                "success",
                "L'immatriculation a été modifiée avec succès !!!"
            );

            return $this->redirectToRoute("app_carte_resident");
        }

        return $this->render("changement_vehicule/edit.html.twig", [
            "form" => $form->createView(), "resident" => $resident
        ]);
    }

    #[Route('/changement/vehicule/travailleur/search', name: 'changement_vehicule.travailleursearch')]
    public function travailleur(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('immatriculation');

        $repository = $entityManager->getRepository(TravailleurDomicile::class);
        $travailleurs = $repository->findBy(['immatriculation' => $searchTerm]);


        return $this->render('changement_vehicule/travailleurdomSearch.html.twig', [
            'searchTerm' => $searchTerm,
            'travailleurs' => $travailleurs,
        ]);
    }

    #[Route('/changement/vehicule/travailleur/{id}', name: 'changement_vehicule.travailleur')]
    public function travailleurDom(Request $request, EntityManagerInterface $manager, TravailleurDomicile $travailleur): Response
    {
        $form = $this->createForm(ChangementVehiculeTravailleurdomType::class, $travailleur);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $travailleur = $form->getData();
            $manager->persist($travailleur);
            $manager->flush();

            $this->addFlash(
                "success",
                "L'immatriculation a été modifiée avec succès !!!"
            );

            return $this->redirectToRoute("travailleur_domicile.index");
        }

        return $this->render("changement_vehicule/travailleurDomicile.html.twig", [
            "form" => $form->createView(), "travailleur" => $travailleur
        ]);
    }

    #[Route('/changement/vehicule/profession/search', name: 'changement_vehicule.professionsearch')]
    public function profession(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('immatriculation');

        $repository = $entityManager->getRepository(ProfessionLiberale::class);
        $professions = $repository->findBy(['immatriculation' => $searchTerm]);


        return $this->render('changement_vehicule/professionSearch.html.twig', [
            'searchTerm' => $searchTerm,
            'professions' => $professions,
        ]);
    }

    #[Route('/changement/vehicule/profession/{id}', name: 'changement_vehicule.profession')]
    public function professionlib(Request $request, EntityManagerInterface $manager, ProfessionLiberale $profession): Response
    {
        $form = $this->createForm(ChangementVehiculeProfessionType::class, $profession);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $profession = $form->getData();
            $manager->persist($profession);
            $manager->flush();

            $this->addFlash(
                "success",
                "L'immatriculation a été modifiée avec succès !!!"
            );

            return $this->redirectToRoute("profession_liberale.index");
        }

        return $this->render("changement_vehicule/profession.html.twig", [
            "form" => $form->createView(), "profession" => $profession
        ]);
    }

    #[Route('/changement/vehicule/entreprise/search', name: 'changement_vehicule.entreprisesearch')]
    public function entreprise(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchTerm = $request->query->get('immatriculation');

        $repository = $entityManager->getRepository(ProfessionLiberale::class);
        $entreprises = $repository->findBy(['immatriculation' => $searchTerm]);


        return $this->render('changement_vehicule/EntrepriseSearch.html.twig', [
            'searchTerm' => $searchTerm,
            'entreprises' => $entreprises,
        ]);
    }





}

