<?php

namespace App\Controller;

use App\Entity\DB\Utilisateur;
use App\Entity\InscriptionTask;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request): Response
    {
        $inscription = new InscriptionTask();

        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
