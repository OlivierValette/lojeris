<?php

namespace App\Controller;

use App\Entity\Logement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogementController extends AbstractController
{
    /**
     * @Route("/logement", name="logement")
     */
    public function index(): Response
    {
        $logements = $this->getDoctrine()
            ->getRepository(Logement::class)
            ->findAll();
        
        return $this->render('logement/index.html.twig', [
            'logements' => $logements,
        ]);
    }
    
    /**
     * @Route("/logement/{id}", name="logement_show", methods="GET")
     */
    public function show(Request $request, Logement $logement): Response
    {
        return $this->render('logement/show.html.twig', [
            'logement' => $logement,
        ]);
    }
}