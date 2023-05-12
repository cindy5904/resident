<?php

namespace App\Form;

use App\Entity\Residents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegieType extends AbstractType
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
            ->add('numeroAppartement')
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            // ->add('commentaires')
            // ->add('dateCreation')
            // ->add('demandeCourrier')
            // ->add('demandeInternet')
            // ->add('voiePostale')
            // ->add('dateDeMiseEnIncomplet')
            // ->add('dateDeCompletude', DateType::class, [
            //     "attr" => [
            //         'class' => 'js-datepicker rounded'
            //     ],
            //     'widget' => 'single_text',
            //     'format' => 'dd/MM/yyyy',
            //     'html5' => false,
            //     'required' => false,
            //     'label' => 'Date de délivrance',
            //     'label_attr' => [
            //         'class' => 'form-label mt-2 text-warning'
            //     ]

            // ])
            // ->add('dateDeReponseAdministre')
            // ->add('numeroDossier')
            // ->add('dateEnvoiCarte', DateType::class, [
            //     "attr" => [
            //         "class" => "js-datepicker rounded "
            //     ],
            //     "widget" => "single_text",
            //     "format" => "dd/MM/yyyy",
            //     'html5' => false,
            //     'required' => false,
            //     "label" => "Date d'envoi de la carte",
            //     "label_attr" => [
            //         "class" => "form-label mt-2 text-warning"
            //     ]
            // ])
            // ->add('changementVehicule')
             ->add('numeroCarte')
            //  ->add('attestationHonneur')
            // ->add('carteSupprimee')
            ->add('adresse')
            ->add('modeReglement')
            ->add('delivreePar')
            ->add('montant')
            // ->add('vehiculeVert')
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-4 rounded",
                    "novalidate" => true,
                ],
                "label" => "Enregistrer",
            ]);
        
    }
        
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Residents::class,
        ]);
    }
}
