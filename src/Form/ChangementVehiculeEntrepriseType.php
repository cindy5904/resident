<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\ListeEntreprise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangementVehiculeEntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            ->add('carteGrise')
            ->add('commentaires')
            ->add('changementVehicule')
            ->add('carteSupprimee')
            ->add('numeroCarte')
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
            ->add('vehiculeVert')
            ->add('montant')
            ->add('denomination')
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-info mt-4 rounded",
                    "novalidate" => true,
                ],
                "label" => "Enregistrer",
            ])
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-4 rounded",
                    "novalidate" => true,
                ],
                "label" => "Enregistrer",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
