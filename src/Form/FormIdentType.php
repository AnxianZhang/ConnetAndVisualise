<?php

namespace App\Form;

use App\Entity\IdentTask;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormIdentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Enter your username',
                ],
            ])
            ->add('pwd', PasswordType::class, [
                'required' => false,
                'label' => 'Matricule',
                'attr' => [
                    'placeholder' => 'Enter your password',
                ],
            ])
            ->add('send', SubmitType::class, [
                'label' => 'soumettre',
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
