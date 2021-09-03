<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Categorie;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options["ajouter"]) {

            $builder
                ->add('titre', TextType::class, [
                    'label' => "Titre de l'annonce",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir le titre",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('description_courte', TextType::class, [
                    'label' => "Description de l'annonce",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir une description",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('description_longue', TextareaType::class, [
                    'label' => "Détails de l'annonce",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir une description",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('prix', MoneyType::class, [
                    "currency" => "EUR",
                    "label" => "Prix ",
                    "required" => false,
                    "attr" => [
                        "placeholder" => "Saisir le prix du produit",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('adresse', TextType::class, [
                    'label' => "Adresse",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir votre adresse",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('image', FileType::class, [
                    'label' => false,
                    'required' => false,
                    // 'multiple'=> true,
                    'mapped' => false

                ])

                ->add('cp', TextType::class, [
                    'label' => "Code Postal",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir votre Code Postal",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('ville', TextType::class, [
                    'label' => "Ville",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "Votre ville",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('categorie', EntityType::class, [
                    'class' => Categorie::class,
                    'choice_label' => "titre"
                ])
                ;
                
                ;
        } elseif ($options['modifier']) {
            $builder
                ->add('titre', TextType::class, [
                    'label' => "Titre de l'annonce",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir le titre",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('description_courte', TextType::class, [
                    'label' => "Description de l'annonce",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir une description",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('description_longue', TextareaType::class, [
                    'label' => "Description de l'annonce",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir une description",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('prix', MoneyType::class, [
                    "currency" => "EUR",
                    "label" => "Prix ",
                    "required" => false,
                    "attr" => [
                        "placeholder" => "Saisir le prix du produit",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('adresse', TextType::class, [
                    'label' => "Adresse",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir votre adresse",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('image', FileType::class, [
                    'mapped' => false,
                    'required' => false
                ])

                ->add('cp', TextType::class, [
                    'label' => "Code Postal",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "saisir votre Code Postal",
                        'class' => 'col-md-12'
                    ]
                ])

                ->add('ville', TextType::class, [
                    'label' => "Ville",
                    'required' => false,
                    'attr' => [
                        'placeholder' => "Votre ville",
                        'class' => 'col-md-12'
                    ]
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
            'ajouter' => false,
            'modifier' => false
        ]);
    }
}
