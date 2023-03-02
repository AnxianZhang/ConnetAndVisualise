<?php

namespace App\Controller;

use App\Entity\DB\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\IdentTask;
use App\Form\FormIdentType;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

use function PHPUnit\Framework\identicalTo;

class UserController extends AbstractController
{
    #[Route('/user/ident', name: 'app_user')]
    public function index(Request $request, SessionInterface $session, UserRepository $userRepo): Response
    {
        // $url = $this->generateUrl('');

        $ident = new IdentTask();

        $form = $this->createForm(FormIdentType::class, $ident);
        $form->handleRequest($request);

        // if ($request->request->has("form_ident[inscription]")){
        //     return new Response("inscription");
        // }
        if ($form->isSubmitted() && $form->isValid()){
            $formDatas = $form->getData();
            $userNamePwd = $userRepo // l'utilisateur correspondant au nom et au mot de passe fournis
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

            $session->set("connectedUser", serialize($userNamePwd));

            return $this->redirectToRoute('show_contact', [
                // 'IdNom' => $userRepo->findIdSelonNomMdp($formDatas->getName(), $formDatas->getPwd())
            ]);
        }

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}