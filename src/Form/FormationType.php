<?php

namespace App\Form;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\EasyAdminFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FormationType
 *
 * @package \App\Form
 */
class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('ecole');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class
        ]);
//        $resolver->setRequired([
//            'data-parent'
//        ]);
    }
}
