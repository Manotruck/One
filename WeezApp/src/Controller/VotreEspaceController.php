<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VotreEspaceController extends AbstractController
{
    #[Route('/votre/espace', name: 'app_votre_espace')]
    public function index(): Response
    {
        return $this->render('votre_espace/index.html.twig', [
            'controller_name' => 'VotreEspaceController',
        ]);
    }
}
