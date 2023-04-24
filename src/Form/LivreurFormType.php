<?php

namespace App\Form;

use App\Entity\Livreur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LivreurFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('prenom', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('num', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('region', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('save',SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary']
            ]);

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livreur::class,
        ]);
    }
}