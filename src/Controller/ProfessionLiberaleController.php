<?php

namespace App\Controller;

use App\Entity\ProfessionLiberale;
use App\Form\ProfessionLiberaleType;
use App\Repository\ProfessionLiberaleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionLiberaleController extends AbstractController
{
    #[Route('/profession/liberale', name: 'profession_liberale.index')]
    public function index(ProfessionLiberaleRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
            $professions = $paginator->paginate(
            $repository->findById(),
            $request->query->getInt('page', 1),
            10
        );
    
        return $this->render('profession_liberale/index.html.twig', [
            'professions' => $professions,
        ]);
    }
    #[Route('/profession/liberale/create', name: 'profession_liberale.new',  methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $professions = new ProfessionLiberale();
        $form = $this->createForm(ProfessionLiberaleType::class, $professions);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $professions = $form->getData();
            $manager->persist($professions);
            $manager->flush();

            $this->addFlash(
                "success",
                "La carte profession libérale a été créée avec succès !!!"
            );

            return $this->redirectToRoute("profession_liberale.index");
        }

        return $this->render('profession_liberale/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/profession/liberale/edit/{id}', name: 'profession_liberale.edit',  methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, ProfessionLiberale $profession): Response
    {
        $form = $this->createForm(ProfessionLiberaleType::class, $profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $profession = $form->getData();
            $manager->persist($profession);
            $manager->flush();

            $this->addFlash(
                "success",
                "Profession libérale a été modifié avec succès !!!"
            );

            return $this->redirectToRoute("profession_liberale.index");
        }
        return $this->render("profession_liberale/edit.html.twig", [
            "form" => $form->createView(), "profession" => $profession
        ]);   
    }

    #[Route('/profession/liberale/show/{id}', name: 'profession_liberale.show')]
    public function show(ProfessionLiberale $profession): Response
    {
        return $this->render('profession_liberale/show.html.twig', [
            'profession' => $profession,
        ]);
    }

}
