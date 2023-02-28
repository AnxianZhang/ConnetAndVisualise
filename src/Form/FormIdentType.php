<?php

namespace App\Form;

use App\Entity\IdentTask;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormIdentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => $options['require_nom'],
                'label' => 'Nom',
                ])
            ->add('matricule', TextType::class, [
                'required' => $options['require_matricule'],
                'label' => 'Matricule',
                ])
            ->add('soumettre', SubmitType::class, [
                'label' => 'soumettre',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'require_nom' => true,
            'require_matricule' => false,
        ]);
    }
}
