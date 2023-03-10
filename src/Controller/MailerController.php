<?php

namespace App\Controller;

use App\Entity\ContactUsTask;
use App\Form\ContactUsType;
use Doctrine\ORM\Query\Expr\From;
use Symfony\Component\Mime\Email;
use SplSubject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;


class MailerController extends AbstractController
{
    #[Route('/user/mailer', name: 'app_mailer')]
    public function index(MailerInterface $mailer, SessionInterface $session, Request $request): Response
    {
        if (!$session->has("connectedUser")){
            return $this->redirectToRoute('app_user');
        }

        $connectedUser = unserialize($session->get('connectedUser'));

        $mailTask = new ContactUsTask();
        $form = $this->createForm(ContactUsType::class, $mailTask);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $formDatas = $form->getData();

            $email = (new Email())
                ->from($connectedUser->getEmail())
                ->to('gadanxianzhang2@gmail.com')
                ->subject($formDatas->getSubject())
                ->text($formDatas->getText())
                ->html('<p>See Twig integration for better HTML integration!</p>');

                
            $mailer->send($email);
        }

        return $this->render('mailer/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
