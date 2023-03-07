<?php

namespace App\Controller;

use App\Entity\AddContactTask;
use App\Entity\DB\Utilisateur;
use App\Form\AddContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping\Id;
use LDAP\Result;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Serializer\SerializerInterface;


class ContactController extends AbstractController
{
    #[Route('/user/contact', name: 'show_contact')]
    public function index(SessionInterface $session, ContactRepository $contactRepo): Response
    {
        if (!$session->has("connectedUser")){
            return $this->redirectToRoute('app_user');
        }

        $user = unserialize($session->get('connectedUser'));

        $userId = $user->getidNom();

        $contacts = $contactRepo
            ->findContactsInfoById($userId);

        // $user = $contactRepo
        //     ->findUserInfoById($userId);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contacts'=>$contacts,
            'user'=>$user,
        ]);
    }

    #[Route('/user/logout', name: 'log_out')]
    public function logOut(SessionInterface $session): Response{
        $session->remove("connectedUser");

        return $this->redirectToRoute('app_user');
    }

    #[Route('/user/contact/removeUser/{contactId}', name:'remove_contact')]
    public function removeContact($contactId, ContactRepository $contactRepo): Response{
        $contact = $contactRepo
            ->findOneBy(
            ['idContact' => $contactId],
        );
        $contactRepo->remove($contact, true);
        return $this->redirectToRoute('show_contact');
    }
}
