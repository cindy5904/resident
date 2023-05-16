<?php

namespace App\Form;

use App\Entity\TravailleurDomicile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangementVehiculeTravailleurdomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Civilite', ChoiceType::class, [
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
            ->add('numeroCarte')
            ->add('commentaires')
            ->add('changementVehicule')
            ->add('carteSupprimee')
            ->add('dateCreation', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded "
                ],
                "widget" => "single_text",
                "format" => "dd/MM/yyyy",
                'html5' => false,
                'required' => false,
                "label" => "Date de création (Année en cours)",
                "label_attr" => [
                    "class" => "form-label mt-2 text-warning"
                ]
            ])
            ->add('dateAnDernier', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded"
                ],
                "widget" => "single_text",
                "format" => "dd/MM/yyyy",
                'html5' => false,
                'required' => false,
                "label" => "Date de l'année précédente",
                "label_attr" => [
                    "class" => "form-label mt-2 text-warning"
                ]
            ])
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
