<?php

namespace App\Form;

use App\Entity\NumericCharacters;
use App\Entity\Residents;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
            // ce code permet de bloqué le numero appartement au type numérique
            // ->add('numeroAppartement', IntegerType::class, [
            //     'required' => false,
            //     'attr' => ['placeholder' => 'Veuillez saisir le numéro d\'appartement si disponible'],
            //     'constraints' => [
            //         new Assert\Regex([
            //             'pattern' => '/^\d*$/',
            //             'message' => 'Le numéro d\'appartement doit contenir uniquement des caractères numériques.',
            //             'groups' => ['numeric_validation'],
            //         ]),
            //         new Assert\NotBlank([
            //             'message' => 'Le numéro d\'appartement ne peut pas être vide.',
            //             'groups' => ['numeric_validation'],
            //         ]),
            //     ],
                
            // ])
           
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
                "format" => "dd/MM/yyyy",
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
                "format" => "dd/MM/yyyy",
                'html5' => false,
                'required' => false,
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
                "format" => "dd/MM/yyyy",
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
                "label" => "Enregistrer",
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Residents::class,
        ]);
    }

     // ce code permet de bloqué le numero appartement au type numérique
    // public function validateForm(FormInterface $form, ValidatorInterface $validator)
    // {
    // $validator->validate($form, null, ['numeric_validation']);

    // if (!$form->isValid()) {
    //     $form->addError(new FormError('Veuillez corriger les erreurs dans le formulaire.'));
    // }
    // }
}
