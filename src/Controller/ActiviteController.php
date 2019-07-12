<?php
namespace App\Controller;

use App\Form\ActiviteType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class ActiviteController extends EasyAdminController
{
    public $em;
    function  __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function createActiviteEntityForm($entity, array $entityProperties, $view) {
        $form = $this->createForm(ActiviteType::class, $entity, [
            'entity' => $this->entity['name'],
            'view' => $view
        ]);

        return $form;
    }

}
