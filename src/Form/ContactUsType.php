<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('subject', TextType::class, [
                'required' => false,
                'label' => 'Mail subject',
                'attr' =>[
                    'placeholder' => 'ex: DST',
                ]
            ])
            ->add('text', TextareaType::class, [
                'required' => false,
                'label' => 'Mail Text',
                'attr' =>[
                    'placeholder' => 'ex: DST',
                ]
            ])
            ->add('send', SubmitType::class, [
                'label' => 'Send',
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
