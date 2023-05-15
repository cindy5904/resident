<?php

namespace App\Controller;

use App\Entity\Residents;
use App\Form\AjoutResidentType;
use App\Form\RegieType;
use App\Form\RenouvellementResidentType;
use App\Repository\ResidentsRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class CarteResidentController extends AbstractController
{
    #[Route('/carte/resident', name: 'app_carte_resident')]
    public function index(ResidentsRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
        {
            $searchTerm = $request->query->get('search');
            $resident = null;
        
            if ($searchTerm) {
                $resident = $repository->findBy(['nom' => $searchTerm]);
            }
    
            $residents = $paginator->paginate(
            $repository->findById(),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('carte_resident/index.html.twig', [
            'residents' => $residents,
            'searchTerm' => $searchTerm,
            'resident' => $resident
        ]);
    }
}

#[Route('/resident/search', name: 'app_resident_search')]
public function searchName(ResidentsRepository $repository, Request $request): Response
{
    {
        $searchTerm = $request->query->get('search');
        $residents = null;
    
        if ($searchTerm) {
            $residents = $repository->findBy(['nom' => $searchTerm]);
        }
        return $this->render('carte_resident/searchrenouvele.html.twig', [
            'searchTerm' => $searchTerm,
            'residents' => $residents
        ]);
}
}


    #[Route('/resident/creation', name: 'app_resident_new', methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $resident = new Residents;
        $form = $this->createForm(AjoutResidentType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resident = $form->getData();
            $manager->persist($resident);
            $manager->flush();

            $this->addFlash(
                "success",
                "Le résident a été créé avec succès !!!"
            );

            return $this->redirectToRoute("app_carte_resident");
        }

        return $this->render("carte_resident/new.html.twig", [
            "form" => $form->createView()
        ]);
    }

    #[Route('/resident/edition/{id}', name: 'app_resident_edit', methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, Residents $resident): Response
    {

        $form = $this->createForm(AjoutResidentType::class, $resident);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $resident = $form->getData();
            $manager->persist($resident);
            $manager->flush();

            return $this->redirectToRoute("app_carte_resident");
        }

        return $this->render("carte_resident/edit.html.twig", [
            "form" => $form->createView(), "resident" => $resident
        ]);
    }
    #[Route('/resident/renouvellement/{id}', name: 'app_resident_renouvellement')]
    public function renouvellement(Request $request, EntityManagerInterface $manager, Residents $resident): Response
    {
        $form = $this->createForm(RenouvellementResidentType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resident = $form->getData();
            $manager->persist($resident);
            $manager->flush();

            $this->addFlash(
                "success",
                "Le résident a été renouvelé avec succès !!!"
            );

            return $this->redirectToRoute("app_carte_resident");
        }

        return $this->render("carte_resident/renouvellement.html.twig", [
            "form" => $form->createView(), "resident" => $resident
        ]);
    }

    #[Route('/resident/{id}', name: 'app_resident_show')]
    public function show(Residents $resident): Response
    {

        return $this->render('carte_resident/show.html.twig', [
            'resident' => $resident,
        ]);
    }

    #[Route('/resident/regie/{id}', name: 'app_resident_regie', methods: ["GET", "POST"])]
    public function regie(Request $request, EntityManagerInterface $manager, Residents $resident): Response
    {
        
        $resident->setDateCreation(new DateTime());
        $form = $this->createForm(RegieType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resident = $form->getData();
            $manager->persist($resident);
            $manager->flush();


            return $this->redirectToRoute("app_carte_resident");
        }

        return $this->render("carte_resident/regie.html.twig", [
            "form" => $form->createView(), "resident" => $resident
        ]);
    }
    
}
