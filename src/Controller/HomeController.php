<?php
namespace App\Controller;

use App\Entity\Activite;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
    private $em;

    public function __construct( EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="home")
     * @return Response
     */

    public function index(): Response{
        /**Permet de faire le liens entre le model et la vue ^^
        on affiche les activités que l'on recupère dans le getRepository(Activite::class)->findAll();
         et on les affiche dans le homeController  */
        $activites = $this->em->getRepository(Activite::class)->findAll();
        return $this->render('pages/home.html.twig', [
            'activites' => $activites
        ]);
    }


}
