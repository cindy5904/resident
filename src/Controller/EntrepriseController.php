<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use App\Form\SearchType;
use App\Model\SearchData;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\EntrepriseRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'entreprise.index', methods: ["GET"])]
    public function index(EntrepriseRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
    

        $form = $this->createForm(EntrepriseType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entreprises = $paginator->paginate(
                $request->query->getInt('page', 1),
                10
        );
            return $this->render("entreprise/index.html.twig", [
                "form" => $form->createView(),
                "entreprises" => $entreprises
            ]);

        }
        $entreprises = $paginator->paginate(
            $repository->findById(),
            $request->query->getInt('page', 1),
            10
    );

        return $this->render('entreprise/index.html.twig', [
            "form" => $form->createView(),
            'entreprises' => $entreprises
        ]);
    }


    #[Route('/entreprise/creation', name: 'entreprise.new', methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $entreprise = new Entreprise;
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $carteProvisoire = $form->getData();
            $manager->persist($carteProvisoire);
            $manager->flush();

            $this->addFlash(
                "success",
                "L'entreprise a été créée avec succès !!!"
            );

            return $this->redirectToRoute("entreprise.index");
        }

        return $this->render("entreprise/new.html.twig", [
            "form" => $form->createView()
        ]);
    }


    #[Route('/entreprise/edition/{id}', name: 'entreprise.edit', methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, Entreprise $entreprise): Response
    {

        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);
        

        if($form->isSubmitted() && $form->isValid()) {
            $entreprise = $form->getData();
            $manager->persist($entreprise);
            $manager->flush();

            return $this->redirectToRoute("entreprise.index");
        }

        return $this->render("entreprise/edit.html.twig", [
            "form" => $form->createView(), "entreprise" => $entreprise
        ]);
    }

    #[Route('/entreprise/{id}', name: 'entreprise.show', methods: ['GET'])]
    public function show(Entreprise $entreprise): Response
    {
        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }

}
