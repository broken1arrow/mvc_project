<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjForm extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('all_data', SubmitType::class, ['label' => 'Get all data'])
            ->add('wild_data', SubmitType::class, ['label' => 'Wildfires data'])
            ->add('emissions', SubmitType::class, ['label' => 'Emissions'])
            ->add('temp', SubmitType::class, ['label' => 'Global avarage temp'])
            ->add('temp_with_year', SubmitType::class, ['label' => 'Year and avarage temp'])
            ->add('wildfires_with_year', SubmitType::class, ['label' => 'Year and wildfires'])
            ->add('emission_with_year', SubmitType::class, ['label' => 'Year and emissions'])
            ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'attr' => ['data-turbo' => 'false']
            ]
        );
    }
}
