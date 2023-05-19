<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\ProfessionLiberale;
use App\Entity\Residents;
use App\Entity\TravailleurDomicile;
use App\Form\RegieEntrepriseType;
use App\Form\RegieProfessionLiberaleType;
use App\Form\RegieRegisterTravailleurType;
use App\Form\RegisterRegieType;
use App\Repository\EntrepriseRepository;
use App\Repository\ProfessionLiberaleRepository;
use App\Repository\ResidentsRepository;
use App\Repository\TravailleurDomicileRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegieRegisterController extends AbstractController
{
    #[Route('/regie/register/search', name: 'app_regie_register_search')]
    public function index(Request $request, ResidentsRepository $repository, EntityManagerInterface $manager): Response
    {
       $searchTerm = $request->query->get('search');
       $residents = null;

        if ($searchTerm) {
            $residents = $repository->findBy(['nom' => $searchTerm]);
        }
        return $this->render('regie_register/residentsearch.html.twig', [
            'searchTerm' => $searchTerm,
            'residents' => $residents
        ]);  
    }

    #[Route('/regie/register/{id}', name: 'app_regie_register')]
    public function resi(Request $request, Residents $residents,  EntityManagerInterface $manager): Response
    {
         
        $form = $this->createForm(RegisterRegieType::class, $residents);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($residents);
            $manager->flush();

            $this->addFlash(
                "success",
                "Les informations complémentaires ont bien été ajoutées !!!"
            );

            return $this->redirectToRoute("app_carte_resident");
        }
        

        return $this->render('regie_register/index.html.twig', [
            'form' => $form->createView(),
            'residents' => $residents
        ]);
    }

    #[Route('/regie/register/travailleurdom/search', name: 'regie_register.travailleursearch')]
    public function travailleursearch(Request $request, TravailleurDomicileRepository $repository, EntityManagerInterface $manager): Response
    {
       $searchTerm = $request->query->get('search');
       $travailleurs = null;

        if ($searchTerm) {
            $travailleurs = $repository->findBy(['nom' => $searchTerm]);
        }
        return $this->render('regie_register/travailleurdomsearch.html.twig', [
            'searchTerm' => $searchTerm,
            'travailleurs' => $travailleurs
        ]);  
    }

    #[Route('/regie/register/travailleurdom/{id}', name: 'regie_register.travailleur')]
    public function travailleur(Request $request, TravailleurDomicile $travailleurs, EntityManagerInterface $manager): Response
    {
       
        $form = $this->createForm(RegieRegisterTravailleurType::class, $travailleurs);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($travailleurs);
            $manager->flush();

            $this->addFlash(
                "success",
                "Les informations complémentaires ont bien été ajoutées !!!"
            );

            return $this->redirectToRoute("travailleur_domicile.index");
        }
        

        return $this->render('regie_register/regietravailleurdom.html.twig', [
            'form' => $form->createView(),
            'travailleurs' => $travailleurs
        ]);
    }

    #[Route('/regie/register/professionliberale/search', name: 'regie_register.professionsearch')]
    public function professionsearch(Request $request, ProfessionLiberaleRepository $repository, EntityManagerInterface $manager): Response
    {
       $searchTerm = $request->query->get('search');
       $professions = null;

        if ($searchTerm) {
            $professions = $repository->findBy(['nom' => $searchTerm]);
        }
        return $this->render('regie_register/professionsearch.html.twig', [
            'searchTerm' => $searchTerm,
            'professions' => $professions
        ]);  
    }

    #[Route('/regie/register/professionliberale/{id}', name: 'regie_register.profession')]
    public function profession(Request $request, ProfessionLiberale $professions, EntityManagerInterface $manager): Response
    {
      
        $form = $this->createForm(RegieProfessionLiberaleType::class, $professions);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($professions);
            $manager->flush();

            $this->addFlash(
                "success",
                "Les informations complémentaires ont bien été ajoutées !!!"
            );

            return $this->redirectToRoute("profession_liberale.index");
        }
        

        return $this->render('regie_register/professionliberale.html.twig', [
            'form' => $form->createView(),
            'professions' => $professions
        ]);
    }

    #[Route('/regie/register/entreprise/search', name: 'regie_register.entreprisesearch')]
    public function entreprisesearch(Request $request, EntrepriseRepository $repository, EntityManagerInterface $manager): Response
    {
       $searchTerm = $request->query->get('search');
       $entreprises = null;

        if ($searchTerm) {
            $entreprises = $repository->findBy(['nom' => $searchTerm]);
        }
        return $this->render('regie_register/professionsearch.html.twig', [
            'searchTerm' => $searchTerm,
            'entreprises' => $entreprises
        ]);  
    }

    #[Route('/regie/register/entreprise/{id}', name: 'regie_register.entreprise')]
    public function entreprise(Request $request, Entreprise $entreprises, EntityManagerInterface $manager): Response
    {
        
        $form = $this->createForm(RegieEntrepriseType::class, $entreprises);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($entreprises);
            $manager->flush();

            $this->addFlash(
                "success",
                "Les informations complémentaires ont bien été ajoutées !!!"
            );

            return $this->redirectToRoute("entreprise.index");
        }
        

        return $this->render('regie_register/entreprise.html.twig', [
            'form' => $form->createView(),
            'entreprises' => $entreprises
        ]);
    }
}
