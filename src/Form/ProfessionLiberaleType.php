<?php

namespace App\Form;

use App\Entity\ProfessionLiberale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfessionLiberaleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('numeroCarte')
            ->add('civilite', ChoiceType::class, [
                'choices' => [
                    'Monsieur' =>'Monsieur',
                    'Madame' => 'Madame',
                    'Mademoiselle' => 'Mademoiselle',
                ]
            ])
            ->add('nom')
            ->add('prenom')
            ->add('numeroAdresse')
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            ->add('commentaires')
            // ->add('changementVehicule')
            // ->add('carteSupprimee')
            // ->add('dateCreation')
            // ->add('dateAnDernier')
            ->add('adresse')
            // ->add('modeReglement')
            ->add('vehiculeVert')
            ->add('montant')
            ->add('delivreePar')
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-4 rounded",
                    "novalidate" => true,
                ],
                "label" => "Enregistrer",
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfessionLiberale::class,
        ]);
    }
}
