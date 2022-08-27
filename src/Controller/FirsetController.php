<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirsetController extends AbstractController
{
    #[Route('/', name: 'app_template')]
    public function showtemplate(): Response
    {
        return $this->render('template.html.twig', [
        ]);
    }
    #[Route('/firset/{name?test}', name: 'app_firset')]
    public function index($name): Response
    {
        return $this->render('pages/firset/index.html.twig', [
            'name' => $name,
            'path'=>'    '
        ]);
    }
    #[Route('/multiplication/{n1<\d+>}/{n2<\d+>}',name:'multiplication')]
    public function multuplication($n1,$n2):Response{
        $result=$n1*$n2;
         return $this->render('pages/firset/multuplication.html.twig',[
            'result'=>$result
        ]);
    }
}
