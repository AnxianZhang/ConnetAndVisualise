<?php

namespace App\Controller;

use App\Entity\AddContactTask;
use App\Entity\DB\Utilisateur;
use App\Form\AddContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;


class ContactController extends AbstractController
{
    #[Route('/user/contact', name: 'show_contact')]
    public function index(SessionInterface $session, ContactRepository $contactRepo): Response
    {
        // dd($session);
        if (!$session->has("connectedUser")){
            return $this->redirectToRoute('app_user');
        }

        $user = unserialize($session->get('connectedUser'));

        $uId = $user->getidNom();
        $userId = $user->getidNom();

        $contacts = $contactRepo
            ->findContactsInfoById($userId);

        // $user = $contactRepo
        //     ->findUserInfoById($userId);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contacts'=>$contacts,
            'user'=>$user,
            'userId'=>$uId,
        ]);
    }
}
