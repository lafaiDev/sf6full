<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Repository\PersonneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/personne',name:'personne')]
class PersonneController extends AbstractController
{
    #[Route('/', name: '.index',methods:['GET'])]
    public function index(PersonneRepository $repository): Response
    {

        $personnes=$repository->findAll();
        return $this->render('pages/personne/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }

    #[Route('/add',name:'.add',methods:['GET','Post'])]
    public function addPersonne(EntityManagerInterface $em):RedirectResponse{
        $personne=new Personne();
        $personne->setFirstname('test');
        $personne->setName('test');
        $personne->setAge(32);
        $em->persist($personne);
        $em->flush($personne);
        $this->addFlash('success',"persone ajouter avec success");
        return $this->redirectToRoute('personne.index');
    }
}
