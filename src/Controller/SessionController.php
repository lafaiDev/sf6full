<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(Request $request): Response
    {
        //equivalent de session_start() en php
        $session=$request->getSession();

        if($session->has('nbrVisite')){
            $nbrVisite=$session->get('nbrVisite')+1;
            
        }else{
            $nbrVisite=1;
        }
        $session->set('nbrVisite',$nbrVisite);
        return $this->render('pages/session/index.html.twig', [
            'controller_name' => 'SessionController',
        ]);
    }
}
