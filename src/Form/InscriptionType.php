<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'required' => false,
                'label' => 'First name',
                'attr' => [
                    'placeholder' => "ex: Ilié",
                ]
            ])
            ->add('prenom', TextType::class,[
                'required' => false,
                'label' => 'Last name',
                'attr' => [
                    'placeholder' => "ex: Jean-Michel",
                ]
            ])
            ->add('email', EmailType::class,[
                'required' => false,
                'label' => 'Email',
                'attr' => [
                    'placeholder' => "ex: JMI@myMail.com",
                ]
            ])
            ->add('num', PasswordType::class,[
                'required' => false,
                'label' => 'Password',
            ])
            ->add('confirmeNum', PasswordType::class,[
                'required' => false,
                'label' => 'Password',
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Validate',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
