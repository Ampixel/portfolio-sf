<?php

namespace App\Form;

use App\Entity\Activite;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\EasyAdminFormType;
use Symfony\Component\Form\AbstractType;
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
//        $builder->add('ExperienceType', CollectionType::class, [
//            'entry_type' => ExperienceType::class,
//            'allow_add'    => true,
//            'allow_delete' => true
//        ]);
//        $builder->add('FormationType', CollectionType::class, [
//            'entry_type' => FormationType::class,
//            'allow_add'    => true,
//            'allow_delete' => true
//        ]);
        $builder->add('resume');
        $builder->add('dateDebut');
        $builder->add('now');
        $builder->add('place');
        $builder->add('entreprise', ExperienceType::class);
        $builder->add('ecole', FormationType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activite::class
        ]);
    }
}
