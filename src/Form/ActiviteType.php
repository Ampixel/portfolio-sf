<?php

namespace App\Form;

use App\Entity\Activite;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\EasyAdminFormType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ActiviteType
 *
 * @package \App\Form
 */
class ActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resume')
            ->add('dateDebut', DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text'
            ])
            ->add('dateDeFin',DateType::class, [
                'label' => 'Date de fin',
                'widget' => 'single_text'
            ])
            ->add('now',CheckboxType::class, [
                'label' => 'En cours',
                'required' => false
            ])
            ->add('place')
            ->add('idExperience', ExperienceType::class, [
                'label' => 'Expérience',
                'required' => false
            ])
            ->add('idFormation', FormationType::class, [
                'label' => 'Formation',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activite::class
        ]);
    }

    public function getParent()
    {
        return EasyAdminFormType::class;
    }
}
