<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('nom')
            // ->add('prenom')
            // ->add('marqueVehicule')
            // ->add('modele')
            // ->add('immatriculation')
            // ->add('carteGrise')
            // ->add('commentaires')
            // ->add('changementVehicule')
            // ->add('carteSupprimee')
            // ->add('dateCreation')
            // ->add('numeroDeCarte')
            // ->add('denomination')
            // ->add('modeReglement')
            // ->add('vehiculeVert')
            // ->add('montant')
        ->add('nom', TextType::class, [
            "attr" => [
                "class" => "form-control rounded",
                "minLength" => "2",
                "maxLength" => "100"
            ],
            "label" => "Nom",
            "label_attr" => [
                "class" => "form-label mt-2 text-warning"
            ],
            "constraints" =>  [
                new Assert\Length(["min" => 2, "max" => 100])
            ]
        ])
        ->add('prenom', TextType::class, [
            "attr" => [
                "class" => "form-control rounded",
                "minLength" => "2",
                "maxLength" => "100"
            ],
            "label" => "Prénom",
            "label_attr" => [
                "class" => "form-label mt-2 text-warning"
            ],
            "constraints" =>  [
                new Assert\Length(["min" => 2, "max" => 100])
            ],
        ])
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
        ->add('denomination')
        ->add('vehiculeVert') 
        ->add('modeReglement') 
        ->add('montant') 
        ->add('marqueVehicule', TextType::class, [
            "attr" => [
                "class" => "form-control rounded",
                "minLength" => "1",
                "maxLength" => "50"
            ],
            "label" => "Marque du véhicule",
            "label_attr" => [
                "class" => "form-label mt-2 text-warning"
            ],
            "constraints" =>  [
                new Assert\Length(["min" => 1, "max" => 50])
            ]
        ])
        ->add('modele', TextType::class, [
            "attr" => [
                "class" => "form-control rounded",
                "minLength" => "1",
                "maxLength" => "100"
            ],
            "label" => "Modèle",
            "label_attr" => [
                "class" => "form-label mt-2 text-warning"
            ],
            "constraints" =>  [
                new Assert\Length(["min" => 1, "max" => 50])
            ]
        ])
        ->add('immatriculation', TextType::class, [
            "attr" => [
                "class" => "form-control rounded",
                "minLength" => "2",
                "maxLength" => "50"
            ],
            "label" => "Immatriculation",
            "label_attr" => [
                "class" => "form-label mt-2 text-warning"
            ],
            "constraints" =>  [
                new Assert\Length(["min" => 2, "max" => 255])
            ]
        ])
        // ->add('changementVehicule', TextType::class, [
        //     "attr" => [
        //         "class" => "form-control rounded",
        //         "minLength" => "2",
        //         "maxLength" => "50",
        //         "placeholder" => "Immatriculation de l'ancien véhicule"
        //     ],
        //     'required' => false,
        //     "label" => "Changement de véhicule",
        //     "label_attr" => [
        //         "class" => "form-label mt-2 text-warning"
        //     ],
        //     "constraints" =>  [
        //         new Assert\Length(["min" => 2, "max" => 255])
        //     ]
        // ])
        // ->add('carteGrise', CheckboxType::class, [
        //     'attr' => [
        //         'class' => 'form-check-input mr-2'
        //     ],
        //     'required' => false,
        //     'label' => 'Carte grise',
        //     'label_attr' => [
        //         'class' => 'form-check-label text-warning'
        //     ],
        //     'constraints' => [
        //         new Assert\NotNull()
        //     ],
        // ])
        ->add('commentaires', TextareaType::class, [
            "attr" => [
                "class" => "form-control rounded",
                "minLength" => "2",
                "maxLength" => "255"
            ],
            "label" => "Commentaires",
            "required" => false,
            "label_attr" => [
                "class" => "form-label mt-2 text-warning"
            ],
            "constraints" =>  [
                new Assert\Length(["min" => 2, "max" => 255])
            ]
        ])
        // ->add('carteSupprimee', IntegerType::class, [
        //     "attr" => [
        //         "class" => "form-control rounded",
        //         "placeholder" => "Numéro de l'ancienne carte"
        //     ],
        //     'required' => false,
        //     "label" => "Carte supprimée",
        //     "label_attr" => [
        //         "class" => "form-label mt-2 text-warning"
        //     ],
        //     "constraints" =>  [
        //         new Assert\Positive()
        //     ]
        // ])
        // ->add('numeroCarte', IntegerType::class, [
        //     "attr" => [
        //         "class" => "form-control rounded"
        //     ],
        //     "label" => "Numéro de carte",
        //     "label_attr" => [
        //         "class" => "form-label mt-2 text-warning"
        //     ],
        //     "constraints" =>  [
        //         new Assert\Positive()
        //     ]
        // ])
        ->add('submit', SubmitType::class, [
            "attr" => [
                "class" => "btn btn-primary mt-2 rounded"
            ],
            "label" => "Enregistrer carte entreprise",
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
