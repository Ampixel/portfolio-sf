<?php
namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Form\ActiviteType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends AdminController
{
    public $em;
    function  __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function new(Request $request)
    {
        /*
         * @var Experience $experience
         */
        $experience = $this->em->getRepository(Experience::class)->findAll();
        //On récupère l'expérience

        /*
         * @var Formation $formation
         */
        $formation = $this->em->getRepository(Formation::class)->findAll();
        //on récupère la formation

        $experience->getId();
        $formation->getId(); //on récupère l'id
        $activite = new Activite(); // On initie une nouvelle entité activité
        $form = $this->createForm(ActiviteType::class, $activite);//on créer un form qui prend la class activiteType
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $this->em->persist($activite);//on persist notre activite (garde cette entitée en mémoire)
            $this->em->flush();//Ouvre une transaction et enregistre toutes les entités
        }

        return $this->render('easy_admin.yaml', ['form' => $form->createView()]);
    }
}
