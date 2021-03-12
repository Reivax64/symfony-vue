<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\SalleRepository;
use App\Entity\Salle;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
  * @Route("/api/salles", name="api_cours_")
  */
class SalleController extends AbstractController
{
    /**
     * @Route("",name="index",methods={"GET"})
     */
    public function index(SalleRepository $repository): Response
    {
        $cours = $repository->findAll();

        return $this->json($cours,200);
    }

    /**
     * @Route("/{id}",name="detail",methods={"GET"})
     */
    public function detail(Salle $salle = null): Response
    {
        if(!$salle){
            return new JsonResponse([
                "message" => "Salle inexistante"
            ], 404);
        }
        return $this->json($salle,200);
    }
}
