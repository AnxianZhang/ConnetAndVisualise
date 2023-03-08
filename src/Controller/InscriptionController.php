<?php

namespace App\Controller;

use App\Entity\DB\Utilisateur;
use App\Entity\InscriptionTask;
use App\Form\InscriptionType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $inscription = new InscriptionTask();

        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $formDatas = $form->getData();

            // $mdpConfi = $formDatas->getConfirmeNum();
            
            // if($mdp == $mdpConfi){
            $entityManager = $doctrine->getManager();

            $user = new Utilisateur();
            $mdp = $formDatas->getNum();
            // $securityUser = new User();
            

            $user->setNom($formDatas->getNom())
                    ->setPrenom($formDatas->getPrenom())
                    ->setEmail($formDatas->getEmail())
                    ->setNum($mdp);

            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute("app_user");
            // }
            // return $this->render('inscription/index.html.twig',[
            //     'form' => $form->createView(),
            //     'incorrect' => 'mdp incoherent',
            // ]);
        }
        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}