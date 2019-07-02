<?php
namespace App\Controller;

use App\Entity\Activite;
use App\Form\ActiviteType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController;
use Symfony\Component\HttpFoundation\Request;

class ActiviteController extends AdminController
{
    public function new(Request $request, EntityManagerInterface $entityManager)
    {
        $activite = new Activite();
        $form = $this->createForm(ActiviteType::class, $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($activite);
            $entityManager->flush();
        }

        return $this->render('easy_admin', ['form' => $form->createView()]);
    }
}
