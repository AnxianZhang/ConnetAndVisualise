<?php

namespace App\Form;

use App\Entity\IdentTask;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class FormIdentType extends AbstractType
{
    // private $url;

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Name',
                'attr' => [
                    'placeholder' => 'Enter your username',
                ],
            ])
            ->add('pwd', PasswordType::class, [
                'required' => false,
                'label' => 'Password',
                'attr' => [
                    'placeholder' => 'Enter your password',
                ],
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Login',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => IdentTask::class,
            'csrf_protection' => true,
            'csrf_token_id' => 'my_form_token',
        ]);
    }
}
