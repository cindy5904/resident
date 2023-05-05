<?php

namespace App\Controller;

use App\Entity\Residents;
use App\Form\AjoutResidentType;
use App\Repository\ResidentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
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
    #[Route('/resident/search', name: 'app_search_resident')]
    public function searchrenewal(Request $request, EntityManagerInterface $manager): Response
    {
        $nom = $request->query->get('nom');

        $carteResident = $manager->getRepository(Residents::class)->findOneBy(['nom' => $nom]);

    if (!$carteResident) {
        
        return $this->redirectToRoute('app_home');
    }

    
        return $this->render('carte_resident/btn-search.html.twig', [
        'carte' => $carteResident,
    ]);
    }

    #[Route('/resident/renouvellement', name: 'app_renouvellement_resident')]
    public function renouvellement(ResidentsRepository $repository, Request $request, PaginatorInterface $paginator): Response
    {
        $carteResidents = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
        );
        return $this->render('carte_resident/show.html.twig', [
            'CarteResidents' => $carteResidents
        ]);
    }
}



    
    


