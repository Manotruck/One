<?php

namespace App\Controller;

use App\Entity\UserPub;
use App\Form\UserPubType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class UserPubController extends AbstractController
{
    #[Route('/user/pub', name: 'app_user_pub')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {    
        $UserPub = new UserPub();
        $UserPubForm = $this->createForm(UserPubType::class, $UserPub);
        $UserPubForm->handleRequest($request);
            if ($UserPubForm->isSubmitted() && $UserPubForm->isValid()){
        $entityManager->persist($UserPub);
        $entityManager->flush();
            }  
        
        return $this->render('user_pub/index.html.twig', [
            'pub_form' => $UserPubForm->createView(),
        ]);
    }
}