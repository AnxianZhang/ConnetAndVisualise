<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\IdentTask;
use App\Form\FormIdentType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    #[Route('/user/ident', name: 'app_user')]
    public function index(Request $request): Response
    {
        $ident = new IdentTask();

        $requireNom = true;
        $requireMatricule = true;

        $form = $this->createForm(FormIdentType::class, $ident, [
            'require_nom' => $requireNom,
            'require_matricule' => $requireMatricule,
        ]);

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'form' => $form->createView(),
        ]);
    }
}
