<?php

namespace App\Form;


use App\Entity\Recette;
use App\Entity\ZoneGeo;
use App\Entity\RecetteIngredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomRecette')
            ->add('tempsPreparation')
            ->add('tempsCuisson')
            ->add('descriptionRecette')
            ->add('zoneGeo', EntityType::class, [
                'label' => 'Cuisine typique de',
                'placeholder' => '-- Choisir une zone géographique  --',
                'choice_label' => 'nom',
                'class' => ZoneGeo::class
            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => true,
                'multiple' => false,
                'label' => "Uploader votre image",
                'constraints' => [
                    new File([
                        'maxSize' => '2048K',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpg',
                            'image/jpeg',
                            'image/gif'
                        ],
                        'mimeTypesMessage' => "Veuillez télecharger un fichier jpeg"
                    ])
                ]
            ])
            //->add('nomIngredient', EntityType::class,[
            //    
            //    "choice_label" =>"ingredient",
            //    "class" =>RecetteIngredient::class,
            //])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
            
        ]);
    }
}
