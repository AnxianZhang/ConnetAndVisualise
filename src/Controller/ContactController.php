<?php

namespace App\Controller;

use App\Entity\DB\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactController extends AbstractController
{
    #[Route('/contact/contact', name: 'show_contact')]
    public function index(Request $request, SessionInterface $session, ContactRepository $contactRepo): Response
    {
        // dd($session);
        if (!$session->has("connectedUser")){
            return $this->redirectToRoute('app_user');
        }

        $user = unserialize($session->get('connectedUser'));

        $userId = $user->getidNom();

        $contact = $contactRepo
            ->findContactsInfoById($userId);

        // $user = $contactRepo
        //     ->findUserInfoById($userId);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contact'=>$contact,
            'user'=>$user,
        ]);
    }
}
