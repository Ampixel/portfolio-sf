<?php

namespace App\Form;

use App\Entity\Activite;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\EasyAdminFormType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ActiviteType
 *
 * @package \App\Form
 */
class ActiviteType extends EasyAdminFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idExperience', CollectionType::class, [
            'entry_type' => ExperienceType::class
        ]);
        $builder->add('idFormation', CollectionType::class, [
            'entry_type' => FormationType::class
        ]);
        $builder->add('resume');
        $builder->add('dateDebut');
        $builder->add('now');
        $builder->add('place');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activite::class
        ]);
    }
}
