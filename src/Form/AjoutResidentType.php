<?php

namespace App\Form;

use App\Entity\Residents;
use Doctrine\DBAL\Types\DateType as TypesDateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                'attr' => ['placeholder' => 'Veuillez saisir le numéro d\'appartement si disponible'],
                'constraints' => [
                    new Assert\Regex([
                        'pattern' => '/^\d+$/',
                        'message' => 'Le numéro d\'appartement doit contenir uniquement des chiffres.'
                    ]),
                ],
            ])
            ->add('marqueVehicule')
            ->add('modele')
            ->add('immatriculation')
            // ->add('commentaires')
            // ->add('dateCreation')
            // ->add('Delivrance')
            ->add('montant')
            ->add('demandeCourrier')
            ->add('demandeInternet')
            ->add('voiePostale')
            ->add('dateDeMiseEnIncomplet',DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
            'attr' => ['class' => 'js-datepicker'],
            
            ])
            ->add('dateDeCompletude', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
            'attr' => ['class' => 'js-datepicker'],
            
            ])
            ->add('dateDeReponseAdministre', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'dd/MM/yyyy',
            'attr' => ['class' => 'js-datepicker'],
            
            ])
            // ->add('numero_Dossier')
            // ->add('dateEnvoiCarte')
            // ->add('changementVehicule')
            // ->add('carteSupprime')
            ->add('attestationHonneur', null)
            ->add('vehiculeVert')
            // ->add('modeReglement')
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
