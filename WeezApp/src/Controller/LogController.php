<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LogController extends AbstractController
{
    #[Route('/log', name: 'app_log')]
    public function index($authenticationUtils): Response
    {
     $error = $authenticationUtils->getLastAuthenticationError();
     $lastUsername = $authenticationUtils->getLastUsername();
     return $this->render('log/index.html.twig', [
       'last_username' => $lastUsername,
        'error' => $error,
    ]);
    }
 
    #[Route('/logout', name:'app_logout', methods:'GET')]
 
    public function logout(): void
    {
 // controller can be blank: it will never be called!
    throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

}