<?php

namespace App\Form;

use App\Entity\Livraisonuser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Livreur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class LivraisonUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('adresse', null, [
            'attr' => ['class' => 'form-control']
        ])
        ->add('region', null, [
            'attr' => ['class' => 'form-control']
        ])
        ->add('num', null, [
            'attr' => ['class' => 'form-control']
        ])
        ->add('Confirmer', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary']
        ])
        ->add('livreur', EntityType::class, [
            'class' => Livreur::class,
            'choice_label' => 'nom',
            'multiple' => false,
            'expanded' => false,
        ]);
    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livraisonuser::class,
        ]);
    }
}