<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegieImpressionEntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            // ->add('carteGrise')
            ->add('commentaires')
            // ->add('changementVehicule')
            // ->add('carteSupprimee')
            ->add('dateCreation')
            ->add('numeroCarte')
            // ->add('dateAnDernier')
            ->add('modeReglement')
            // ->add('vehiculeVert')
            ->add('montant')
            ->add('denomination')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
