<?php

namespace App\Controller;

use App\Entity\Residents;
use App\Form\AjoutResidentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteResidentController extends AbstractController
{
    #[Route('/carte/resident', name: 'app_carte_resident')]
    public function index(): Response
    {
        return $this->render('carte_resident/index.html.twig', [
            'controller_name' => 'CarteResidentController',
        ]);
    }

    #[Route('/resident/choix', name: 'app_choix_resident')]
    public function choice() : Response
    {
        return $this->render('carte_resident/choix.html.twig');
    }

    #[Route('/resident/register', name: 'app_register_resident')]
    public function ajout(Request $request, EntityManagerInterface $manager) : Response
    {
        $resident = new Residents();
        $form = $this->createForm(AjoutResidentType::class, $resident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $resident->setDateCreation(new \DateTimeImmutable());
            $resident = $form->getData();

            $manager->persist($resident);
            $manager->flush($resident);

            $this->addFlash(
                "success",
                "Le résident a été ajouté avec succès !!!"
            );
            
            return $this->redirectToRoute('app_home');
        }

        return $this->render('carte_resident/register.html.twig', [
            'form' => $form,
        ]);
    }

    
    
    

}
