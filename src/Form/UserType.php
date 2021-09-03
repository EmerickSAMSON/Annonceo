<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options["new"]) {
            $builder
                ->add('pseudo', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('password', RepeatedType::class, [
                    "type" => PasswordType::class,
                    "first_name" => "first",
                    "second_name" => "second",
                    "invalid_message" => "Les mots de passe ne sont pas identiques",
                    "first_options" => [
                        "label" => "Mot de passe",
                        "required" => false,
                        "attr" => [
                            "class" => "col-md-12"
                        ]
                    ],
                    "second_options" => [
                        "label" => "Confirmation du mot de passe",
                        "required" => false,
                        "attr" => [
                            "class" => "col-md-12"
                        ]
                    ],
                    "constraints" => [
                        new NotBlank([
                            'message' => "Veuillez renseigner votre mot de passe"
                        ])
                    ]

                ])
                ->add('nom', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('prenom', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('adresse', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('cp', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('ville', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('telephone', TelType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('email', EmailType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('civilite', ChoiceType::class, [
                    "required" => false,
                    'choices' => [
                        "Homme" => "Homme",
                        "Femme" => "Femme",
                        "Non Genré" => "Non Genré",
                        "Centaure, un homme monté comme un cheval" => "Centaure, un homme monté comme un cheval"
                    ]
                ]);
        } elseif ($options["modifier"]) {
            $builder
                ->add('pseudo', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])

                ->add('nom', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('prenom', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('adresse', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('cp', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('ville', TextType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('telephone', TelType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('email', EmailType::class, [
                    "required" => false,
                    "attr" => [
                        "class" => "col-md-12"
                    ]
                ])
                ->add('civilite', ChoiceType::class, [
                    "required" => false,
                    'choices' => [
                        "Homme" => "Homme",
                        "Femme" => "Femme",
                        "Non Genré" => "Non Genré",
                        "Centaure, un homme monté comme un cheval" => "Centaure, un homme monté comme un cheval"
                    ]
                ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'new' => false,
            'modifier' => false,
        ]);
    }
}
