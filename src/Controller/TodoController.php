<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/todo',name:'todo')]
class TodoController extends AbstractController
{
    #[Route('/', name: '.index')]
    public function index(Request $request): Response
    {
        
        $session=$request->getSession();
        if(!$session->has('listeTodo')){
            $listTodo=array('achat'=>'achter cle usb','cours'=>'Finaliser mon cours');
            $session->set('listeTodo',$listTodo); 
            $this->addFlash("info","la liste des todo a ete bien initailiser");  
        }
        return $this->render('pages/todo/index.html.twig');
    }
    #[Route('/add/{name}/{content}',name:'.add')]
    public function addTodo(Request $request,$name,$content): RedirectResponse
    {
        $session=$request->getSession();
        if($session->has('listeTodo')){
            $listeTodo=$session->get('listeTodo');
            if(isset($listeTodo[$name])){
                $this->addFlash('error','le todo existe deja');
            }else{
                $listeTodo[$name]=$content;
                $session->set('listeTodo',$listeTodo);
                $this->addFlash("success","todo bien ajouter a la liste des todo");
            }
        }else{
            $this->addFlash("error","la liste des todo pas encour initailiser");

        }

        return $this->redirectToRoute('todo.index');
    }
}
