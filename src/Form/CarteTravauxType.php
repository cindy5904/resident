<?php

namespace App\Form;

use App\Entity\CarteTravaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarteTravauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEntrepriseTravaux', TextType::class, [
                "attr" => [
                    "class" => "form-control rounded",
                    "minLength" => "2",
                    "maxLength" => "255"
                ],
                "label" => "Nom de l'entreprise",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 2, "max" => 255])
                ]
            ])
            ->add('dateDebutTravaux', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded"
                ],
                "widget" => "single_text",
                "format" => "dd/MM/yyyy",
                'html5' => false,
                'empty_data' => null,
                "label" => "Date de début des travaux",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
            ])
            ->add('dateFinTravaux', DateType::class, [
                "attr" => [
                    "class" => "js-datepicker rounded"
                ],
                "widget" => "single_text",
                "format" => "dd/MM/yyyy",
                'html5' => false,
                'empty_data' => null,
                "label" => "Date de fin des travaux",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ]
            ])
            ->add('adresse')
            ->add('delivreePar') 
            ->add('numeroAdresse', TextType::class, [
                "attr" => [
                    "class" => "form-control rounded",
                    "minLength" => "1",
                    "maxLength" => "255"
                ],
                "label" => "Numéro d'adresse",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 1, "max" => 255])
                ]
            ])
            ->add('immatriculation', TextType::class, [
                "attr" => [
                    "class" => "form-control rounded",
                    "minLength" => "2",
                    "maxLength" => "255"
                ],
                "label" => "Immatriculation",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 2, "max" => 255])
                ]
            ])
            ->add('carteGrise', CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'required' => false,
                'label' => 'Carte grise (cochez la case si pièce fourni)',
                'label_attr' => [
                    'class' => 'form-check-label text-warning'
                ],
                'constraints' => [
                    new Assert\NotNull()
                ],
            ])
            ->add('devis', CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'required' => false,
                'label' => 'Devis (cochez la case si pièce fourni)',
                'label_attr' => [
                    'class' => 'form-check-label text-warning'
                ],
                'constraints' => [
                    new Assert\NotNull()
                ],
            ])
            ->add('commentaires', TextareaType::class, [
                "attr" => [
                    "class" => "form-control rounded",
                    "minLength" => "2",
                    "maxLength" => "255"
                ],
                "label" => "Commentaires",
                "required" => false,
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 2, "max" => 255])
                ]
            ])
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-4 rounded",
                    "novalidate" => true,
                ],
                "label" => "Enregistrer carte travaux",
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarteTravaux::class,
        ]);
    }
}