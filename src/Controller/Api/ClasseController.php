<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClasseRepository;

/**
  * @Route("/api/classe", name="api_classe_")
  */
class ClasseController extends AbstractController
{
    /**
     * @Route("",name="index",methods={"GET"})
     */
    public function index(ClasseRepository $repository): Response
    {
        $classes = $repository->findAll();

        return $this->json($classes,200);
    }
}
