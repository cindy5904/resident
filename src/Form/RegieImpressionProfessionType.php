<?php

namespace App\Form;

use App\Entity\ProfessionLiberale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegieImpressionProfessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroCarte')
            ->add('civilite')
            ->add('nom')
            ->add('prenom')
            ->add('numeroAdresse')
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            ->add('commentaires')
            // ->add('changementVehicule')
            // ->add('carteSupprimee')
            ->add('dateCreation')
            // ->add('dateAnDernier')
            ->add('adresse')
            ->add('modeReglement')
            // ->add('vehiculeVert')
            ->add('montant')
            ->add('delivreePar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfessionLiberale::class,
        ]);
    }
}
