<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\RecetteIngredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteIngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ingredient', EntityType::class, [
                'label' => 'Choisir un ingrédient',
                'placeholder' => '-- Choisir  --',
                'choice_label' => 'nomIngredient',
                'class' => Ingredient::class
            ])
            //->add('recette')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecetteIngredient::class,
        ]);
    }
}
