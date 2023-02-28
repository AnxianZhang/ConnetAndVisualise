<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\IdentTask;
use App\Form\FormIdentType;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class UserController extends AbstractController
{
    #[Route('/user/ident', name: 'app_user')]
    public function index(Request $request, UserRepository $userRepo): Response
    {
        $ident = new IdentTask();
        $form = $this->createForm(FormIdentType::class, $ident);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $formDatas = $form->getData();

            $userNamePwd = $userRepo
                ->findOneBy([
                    'nom' => $formDatas->getName(),
                    'num' => $formDatas->getPwd(),
                ]);
            
            if (!$userNamePwd){
                return $this->render('user/index.html.twig',[
                    'form' => $form->createView(),
                    'incorrect' => 'The username or password is wrong',
                ]);
            }
            return $this->redirectToRoute("show_contact");
        }

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
            'incorrect' => '',
        ]);
    }


}
