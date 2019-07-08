<?php
namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Form\ActiviteType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController;

class ActiviteController extends AdminController
{
    public $em;
    function  __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function new()
    {
        /**
         * @var Activite $entity
         */
        $entity = $this->executeDynamicMethod('createNew<EntityName>Entity');

        $easyadmin = $this->request->attributes->get('easyadmin');
        $easyadmin['item'] = $entity;
        $this->request->attributes->set('easyadmin', $easyadmin);
        $fields = $this->entity['new']['fields'];

        /*
         * @var Experience $experience
         */
        $experience = $this->em->getRepository(Experience::class)->findAll();
        //On récupère l'expérience

        /*
         * @var Formation $newFormation
         */
        $newFormation = $this->em->getRepository(Formation::class)->findAll();
        //on récupère la formation

        $experience->getId();
        $newFormation->getId(); //on récupère l'id
        $newForm = $this->createForm(ActiviteType::class, $entity, []);//on créer un form qui prend la class activiteType
        $newForm->handleRequest($this->request);
        if ($newForm->isSubmitted() && $newForm->isValid()){
            $this->em->persist($entity);//on persist notre activite (garde cette entitée en mémoire)
            $this->em->flush();//Ouvre une transaction et enregistre toutes les entités

        }
        //On passe la méthode createView du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
//        return $this->render('easy_admin', ['form' => $newForm->createView()]);
        $parameters = array(
            'form' => $newForm->createView(),
            'entity_fields' => $fields,
            'entity' => $entity,
        );
        return $this->executeDynamicMethod('render<EntityName>Template', array('new', $this->entity['templates']['new'], $parameters));
    }
}
