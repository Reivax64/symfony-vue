<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MatiereRepository;


/**
  * @Route("/api/matiere", name="api_matiere_")
  */
class MatiereController extends AbstractController
{
    /**
     * @Route("",name="index",methods={"GET"})
     */
    public function index(MatiereRepository $repository): Response
    {
        $matieres = $repository->findAll();

        return $this->json($matieres,200);
    }
}
