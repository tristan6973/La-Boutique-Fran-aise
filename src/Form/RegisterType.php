<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length(6,2,30),
                'attr' => [
                    'placeholder' => 'Prénom'
                ]
            ])
            ->add('lastname', \Symfony\Component\Form\Extension\Core\Type\TextType::class, [
                "label" => 'Nom de famille',
                'constraints' => new Length(6,2,30),
                'attr' => [
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse mail',
                'constraints' => new Length(10,2,60),
                'attr' => [
                    'placeholder' => 'adresse mail'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                'label' => 'Votre mot de passe',
                'required' => true,
                'first_options' =>['label' => 'Mot de passe',
                    'attr'=> [
                        'placeholder' => 'Merci de saisir votre mot de passe'
                    ]
                    ],
                'second_options' =>['label' => 'Confirmez votre mot de passe',
                    'attr'=> [
                        'placeholder' => 'Merci de confirmer votre mot de passe'
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
