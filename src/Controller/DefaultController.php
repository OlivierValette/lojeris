<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Entity\Quartier;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $logements = $this->getDoctrine()
            ->getRepository(Logement::class)
            ->findAll();
        $quartiers = $this->getDoctrine()
            ->getRepository(Quartier::class)
            ->findBy([], ['libelle' => 'ASC']);
        
        return $this->render('default/homepage.html.twig', [
            "logements" => $logements,
            "quartiers" => $quartiers,
        ]);
    }
}








