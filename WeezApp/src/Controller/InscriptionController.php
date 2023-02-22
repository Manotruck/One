<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {    
        $User = new User();
        $Inscription = $this->createForm(InscriptionType::class, $User);
        $Inscription->handleRequest($request);
            if ($Inscription->isSubmitted() && $Inscription->isValid()){
        $entityManager->persist($User);
        $entityManager->flush();
            }  
        
        return $this->render('inscription/index.html.twig', [
            'inscription_form' => $Inscription->createView(),
        ]);
    }
}