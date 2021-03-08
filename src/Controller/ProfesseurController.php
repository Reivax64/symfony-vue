<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProfesseurRepository;
use App\Entity\Professeur;
use App\Form\ProfesseurType;

/**
 * @Route("/professeurs", name="professeurs_")
 */
class ProfesseurController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(ProfesseurRepository $repository)
    {
        $professeurs = $repository->findAll();

        return $this->render("professeur/index.html.twig",
        ['professeurs' =>$professeurs
        ]);
    }

    /**
     * @Route("/create", name="create", methods={"POST","GET"})
     */
    public function create(Request $request): Response
    {
        $professeur = new Professeur;
        $form = $this->createForm(ProfesseurType::class, $professeur);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $professeur = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($professeur);
            $em->flush();

            return $this->redirectToRoute("professeurs_index");
        }
        
        return $this->render("professeur/create.html.twig",["form" => $form->createView()]);
    }

    /**
     * @Route("/update/{id}", name="update", methods={"POST","GET"})
     */
    public function update(Professeur $professeur,Request $request): Response
    {
        //$professeur = $repository->find($id);
        $form = $this->createForm(ProfesseurType::class, $professeur);
        
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $professeur = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($professeur);
            $em->flush();

            return $this->redirectToRoute("professeurs_index");
        }
        
        return $this->render("professeur/create.html.twig",["form" => $form->createView()]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"GET"})
     */
    public function delete(Professeur $professeur)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($professeur);
        $em->flush();
        return $this->redirectToRoute("professeurs_index");

    }
}
