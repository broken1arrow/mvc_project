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
