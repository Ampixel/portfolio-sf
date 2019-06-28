<?php
namespace App\Controller;

use App\Entity\Activite;
use App\Entity\Experience;
use App\Repository\ExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
    {/**
     * @Route("/elements", name="admin.index")
     * @return Response
     */
    public function index():Response
    {
        $activite = new Activite();
        /**
         * @var \App\Entity\Experience $idExpe
         */
        $idExpe = $this->getDoctrine()->getRepository(Experience::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'current_menu' => 'administrer',
            'idExpe' => $idExpe
        ]);
    }
}

