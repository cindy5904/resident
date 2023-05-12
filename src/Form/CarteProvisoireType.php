<?php

namespace App\Form;

use App\Entity\CarteProvisoire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Test\AssertingContextualValidator;
use Symfony\Component\Validator\Constraints as Assert;


class CarteProvisoireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', ChoiceType::class, [
                'choices'  => [
                    'Monsieur' => 'Monsieur',
                    'Madame' => 'Madame',
                    'Mademoiselle' => 'Mademoiselle',
                ],
                "attr" => [
                    "class" => "form-control rounded"
                ],
                "label" => "Civilité",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ]
            ])
            ->add('nom', TextType::class, [
                "attr" => [
                    "class" => "form-control rounded",
                    "minLength" => "2",
                    "maxLength" => "255"
                ],
                "label" => "Nom",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 2, "max" => 255])
                ]
            ])
            ->add('prenom', TextType::class, [
                "attr" => [
                    "class" => "form-control rounded",
                    "minLength" => "2",
                    "maxLength" => "255"
                ],
                "label" => "Prénom",
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 2, "max" => 255])
                ],
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
                    'class' => 'form-check'
                ],
                'required' => false,
                'label' => 'Carte grise (cochez la case si pièce fourni)',
                'label_attr' => [
                    'class' => 'form-label mt-4 text-warning'
                ],
                'constraints' => [
                    new Assert\NotNull()
                ],
            ])
            ->add('justificatifMoins3Mois', CheckboxType::class, [
                'attr' => [
                    'class' => 'form-check'
                ],
                'required' => false,
                'label' => 'Justificatif de moins de 3 mois (cochez la case si pièce fourni)',
                'label_attr' => [
                    'class' => 'form-label mt-4 text-warning'
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
                "label_attr" => [
                    "class" => "form-label mt-4 text-warning"
                ],
                "constraints" =>  [
                    new Assert\Length(["min" => 2, "max" => 255])
                ]
                ])
            ->add('submit', SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary mt-4 rounded"
                ],
                "label" => "Enregistrer",
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarteProvisoire::class,
        ]);
    }
}
