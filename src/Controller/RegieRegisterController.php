<?php

namespace App\Controller;

use App\Entity\Residents;
use App\Form\RegisterRegieType;
use App\Repository\ResidentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegieRegisterController extends AbstractController
{
    #[Route('/regie/register', name: 'app_regie_register')]
    public function index(Request $request, ResidentsRepository $repository, EntityManagerInterface $manager): Response
    {
    
        $searchTerm = $request->query->get('search');
        $nom = null;
        $residents = null;

        if ($searchTerm) {
            $residents = $repository->findOneBy(['nom' => $searchTerm]);
        }

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
            'searchTerm' => $searchTerm,
            'nom' => $nom,
            'form' => $form->createView(),
            'residents' => $residents
        ]);
    }
}
