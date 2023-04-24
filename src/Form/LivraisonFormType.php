<?php

namespace App\Form;

use App\Entity\Livraison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LivraisonFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse', null, [
                'attr' => ['class' => 'form-control','html5' => false,]
            ])
            ->add('region', null, [
                'attr' => ['class' => 'form-control']
            ])
          
            ->add('num', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('idUser', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('idProduit', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('idLivreur', null, [
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
            'data_class' => Livraison::class,
        ]);
    }
}