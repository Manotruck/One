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
        $InscriptionForm = $this->createForm(InscriptionType::class, $User);
        $InscriptionForm->handleRequest($request);
            if ($InscriptionForm->isSubmitted() && $InscriptionForm->isValid()){
        $entityManager->persist($User);
        $entityManager->flush();
            }  
        
        return $this->render('inscription/index.html.twig', [
            'inscription_form' => $InscriptionForm->createView(),
        ]);
    }
}