<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Competances;
use App\Entity\Techno;
use App\Entity\FrameworkLogiciel;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a Formation Name',
                    ]),                    
                ],
            ])
            ->add('Date_Debut', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a Date',
                    ]),                    
                ],
            ])
            ->add('Date_Fin', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a Date',
                    ]),                    
                ],
            ])
            ->add('ecole', TextType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a School',
                    ]),                    
                ],
            ])
            ->add('niveau')
            ->add('description')
            // ->add('cv')
            ->add('Categories', CollectionType::class, [
                'entry_type' => Category::class,
                'entry_options' => ['name' => false],
            ])
            ->add('Competances', CollectionType::class, [
                'entry_type' => Competances::class,
                'entry_options' => ['name' => false],
            ])
            ->add('Technos', CollectionType::class, [
                'entry_type' => Techno::class,
                'entry_options' => ['name' => false],
            ])
            ->add('FramLog', CollectionType::class, [
                'entry_type' => FrameworkLogiciel::class,
                'entry_options' => ['name' => false],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
