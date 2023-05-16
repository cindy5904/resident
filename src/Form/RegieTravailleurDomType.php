<?php

namespace App\Form;

use App\Entity\TravailleurDomicile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegieTravailleurDomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite')
            ->add('nom')
            ->add('prenom')
            ->add('numeroAdresse')
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            ->add('numeroCarte')
            ->add('commentaires')
            // ->add('changementVehicule')
            // ->add('carteSupprimee')
            ->add('DateCreation')
            ->add('dateAnDernier')
            ->add('modeReglement')
            ->add('montant')
            ->add('adresse')
            ->add('delivreePar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TravailleurDomicile::class,
        ]);
    }
}
