<?php

namespace App\Form;

use EasyCorp\Bundle\EasyAdminBundle\Form\Type\EasyAdminFormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ExperienceType
 *
 * @package \App\Form
 */
class ExperienceType extends EasyAdminFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('poste');
        $builder->add('entreprise');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Experience::class
        ]);
    }
}
