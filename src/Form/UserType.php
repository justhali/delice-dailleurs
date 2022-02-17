<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('pseudo')
            ->add('email')
            ->add('password', PasswordType::class, [
                "required" => true, 
                'label' => "Mot de passe",
                'attr' => [
                'placeholder' => "Entrez votre mot de passe"
                ]
            ])
            ->add('roles', ChoiceType::class, [
            "choices" => [
                "Utilisateur" => "ROLE_UTILISATEUR",
                "Administrateur" => "ROLE_ADMIN"
            ],
            "multiple" => true,
            "expanded" => true
            ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
