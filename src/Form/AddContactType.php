<?php

namespace App\Form;

use App\Entity\AddContactTask;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class,[
                'required' => false,
                'label' => 'Prenom',
                'attr' => [
                    'placeholer' => 'Concact first name',
                ]
            ])

            ->add('lastName', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Contact last name',
                ]
            ])

            ->add('email', TextType::class, [
                'required' => false,
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Contact email',
                ]
            ])

            ->add('send', SubmitType::class, [
                'label' => 'Add',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => AddContactTask::class,
            'csrf_protection' => true,
            'csrf_token_id' => 'my_form_token',
        ]);
    }
}
