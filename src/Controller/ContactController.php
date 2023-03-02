<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact/contact', name: 'show_contact')]
    public function index(Request $request, ContactRepository $contactRepo): Response
    {
        $session = $request->getSession();
        $IdNom = $session->get('IdNom');
        //$IdNom=$request->query->get('IdNom');

        $contact = $contactRepo
        ->findContactInfoById($IdNom);

        $user = $contactRepo
        ->findUserInfoById($IdNom);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contact'=>$contact,
            'user'=>$user,
        ]);
    }
}
