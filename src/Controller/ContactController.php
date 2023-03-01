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
        $IdNom=$request->query->get('IdNom');
        $contact = $contactRepo
        ->findBy(
            ['idNom' => $IdNom],
        );

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'IdNom'=>$IdNom,
            'contact'=>$contact,
        ]);
    }
}
