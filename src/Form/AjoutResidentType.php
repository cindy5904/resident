<?php

namespace App\Form;

use App\Entity\Residents;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints as Assert;


class AjoutResidentType extends AbstractType
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
            ->add('adresse')
            ->add('numeroAppartement', null, [
                'required' => false, 
                'attr' => ['placeholder' => 'Veuillez saisir le numéro d\'appartement si disponible'],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d*$/', 
                        'message' => 'Le numéro d\'appartement doit contenir uniquement des chiffres positifs.',
                    ]),
                ],
            ])
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            ->add('commentaires')
            // ->add('dateCreation')
            ->add('montant')
            ->add('demandeCourrier')
            ->add('demandeInternet')
            ->add('voiePostale')
            ->add('dateDeMiseEnIncomplet', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded "
                ],
                "widget" => "single_text",
                "format" => "dd/mm/yyyy",
                'html5' => false,
                'required' => false,
                "label" => "Date de mise en incomplet",
                "label_attr" => [
                    "class" => "form-label mt-2 text-warning"
                ]
            ])
            ->add('dateDeCompletude', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded",
                    "valueDefault" => "00/00/0000"
                ],
                "widget" => "single_text",
                "format" => "dd/mm/yyyy",
                'html5' => false,
                'required' => false,
                // 'empty_data' => null,
                "label" => "Date de complétude",
                "label_attr" => [
                    "class" => "form-label mt-2 text-warning"
                ]
            ])
            ->add('dateDeReponseAdministre', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded"
                ],
                "widget" => "single_text",
                "format" => "dd/mm/yyyy",
                'html5' => false,
                'required' => false,
                "label" => "Date de réponse à l'administré",
                "label_attr" => [
                    "class" => "form-label mt-2 text-warning"
                ]
            ])
            // ->add('numero_Dossier')
            // ->add('dateEnvoiCarte')
            // ->add('changementVehicule')
            // ->add('carteSupprime')
            ->add('attestationHonneur', null)
            ->add('vehiculeVert')
            ->add('modeReglement')
            ->add('delivreePar')
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-4 rounded",
                    "novalidate" => true,
                ],
                "label" => "Ajouter résident",
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Residents::class,
        ]);
    }
}
