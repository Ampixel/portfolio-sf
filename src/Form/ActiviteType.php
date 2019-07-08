<?php

namespace App\Form;

use App\Entity\Activite;
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
        $builder->add('resume');
        $builder->add('dateDebut');
        $builder->add('now');
        $builder->add('place');
        $builder->add('entreprise', ExperienceType::class);
        $builder->add('poste', ExperienceType::class);
        $builder->add('ecole', FormationType::class);
        $builder->add('titre', FormationType::class);

        $form = $builder->getForm();
        return $this->render('easyadmin', array('form' => $form->createView(),));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activite::class
        ]);
    }
}
