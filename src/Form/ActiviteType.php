<?php

namespace App\Form;

use App\Entity\Activite;
use phpDocumentor\Reflection\Type;
use function PHPSTORM_META\type;
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
        $builder
            ->add('resume')
            ->add('dateDebut')
            ->add('now')
            ->add('place')
            ->add('experience', ExperienceType::class)
            ->add('formation', FormationType::class);

    }
}
