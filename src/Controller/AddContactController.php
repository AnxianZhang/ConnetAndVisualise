<?php

namespace App\Controller;

use App\Entity\DB\Utilisateur;
use App\Entity\DB\Contact;
use App\Entity\AddContactTask;
use App\Form\AddContactType;
use App\Repository\UserRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddContactController extends AbstractController
{
    #[Route('/addContact/{id}', name: 'app_add_contact')]
    public function index($id, Request $request, ManagerRegistry $doctrine, UserRepository $userRepo, ContactRepository $contactRepo): Response
    {
        $new = new AddContactTask();
    
        $form = $this->createForm(AddContactType::class, $new);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formDatas = $form->getData();
            $contactValide = $userRepo // l'utilisateur correspondant au nom et au mot de passe fournis
                ->findOneBy([
                    'prenom' => $formDatas->getFirstName(),
                    'nom' => $formDatas->getLastName(),
                    'email' => $formDatas->getEmail(),
                ]);
            
            if (!$contactValide){
                return $this->render('add_contact/index.html.twig',[
                    'form' => $form->createView(),
                    'incorrect' => 'this people not in our data',
                ]);
            }
            $contactExiste = $contactRepo // l'utilisateur correspondant au nom et au mot de passe fournis
                ->findOneBy([
                    'idNom'=>$id,
                    'idContact' => $contactValide->getIdNom(),
                ]);
            if($contactExiste){
                return $this->render('add_contact/index.html.twig',[
                    'form' => $form->createView(),
                    'incorrect' => 'this people is already exists in your contact',
                ]);
            }
            $entityManager=$doctrine->getManager();
            $contact= new Contact();
            $contact->setIdNom($id);//attends la solution
            $contact->setIdContact($contactValide->getIdNom());
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('show_contact');
        }
        return $this->render('add_contact/index.html.twig', [
            'controller_name' => 'AddContactController',
            'form' => $form->createView(),
        ]);
    }
}
