<?php

namespace App\Form;



use App\Entity\Favori;
use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FavoriType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('user',EntityType::class,[
           //     "class" => User::class,
           //     'label' => 'choisir un ingrédient',
           //     'placeholder' => '-- choisir  --',
           //     "choice_label" => "nomUser"
           // ])
            ->add('recette', EntityType::class, [
                'label' => 'Choisir une recette',
                'placeholder' => '-- Choisir  --',
                'choice_label' => 'nomRecette',
                'class' => Recette::class
               
            ])
        ;


       

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Favori::class,
        ]);
    }
}
