<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursRepository;



 /**
  * @Route("/api/cours", name="api_cours_")
  */
class CoursController extends AbstractController
{
    /**
     * @Route("",name="index",methods={"GET"})
     */
    public function index(CoursRepository $repository) :Response
    {
        $cours = $repository->findAll();

        return $this->json($cours,200);

    }

    /**
     * @Route("/today",name="_today",methods={"GET"})
     */
    public function today(CoursRepository $repository) :Response
    {
        $now = new \DateTime();

        $cours = $repository->getByDate($now);

        return $this->json($cours,200);

    }

    /**
     * @Route("/between/{datedebut}/{dateend}",name="_between",methods={"GET"})
     */
    public function between(CoursRepository $repository,$datedebut,$dateend) :Response
    {
        //$date = DateTime::createFromFormat('j-M-Y', '15-Feb-2009');
        $datetime = new \DateTime();
        $debut = $datetime->createFromFormat('d-m-Y', $datedebut);
        $end = $datetime->createFromFormat('d-m-Y', $dateend);


        // $debut = \DateTime::createFromFormat('j-M-Y', $datedebut);
        // $end = \DateTime::createFromFormat('j-M-Y', $dateend);


        $cours = $repository->getByDateBetween($debut,$end);

        return $this->json($cours,200);

    }
}
