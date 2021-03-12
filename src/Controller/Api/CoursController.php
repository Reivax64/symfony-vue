<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CoursRepository;
use App\Repository\ProfesseurRepository;
use App\Repository\MatiereRepository;
use App\Repository\SalleRepository;
use App\Repository\ClasseRepository;
use Symfony\Component\HttpFoundation\JsonResponse;


use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cours;
use App\Entity\Classe;


 /**
  * @Route("/api/cours", name="api_cours")
  */
class CoursController extends AbstractController
{
    /**
     * @Route("",name="",methods={"GET"})
     */
    public function index(CoursRepository $repository) :Response
    {
        $cours = $repository->findAll();

        return $this->json($cours,200);

    }

    /**
     * @Route("/classe/{id}",name="by_classe",methods={"GET"})
     */
    public function indexByClasse(Classe $classe = null, CoursRepository $repository) :Response
    {
        if(!$classe){
            return new JsonResponse([
                "message" => "Classe inexistante"
            ], 404);
        }

        $cours = $repository->findBy(
            ['classe' => $classe->getId()]
        );

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
     * @Route("/classe/{id}/today",name="_today_by_classe",methods={"GET"})
     */
    public function todayByClasse(Classe $classe = null, CoursRepository $repository) :Response
    {
        if(!$classe){
            return new JsonResponse([
                "message" => "Classe inexistante"
            ], 404);
        }

        $now = new \DateTime();

        $cours = $repository->getByDate($now,$classe);

        return $this->json($cours,200);
    }
    

    /**
     * @Route("/between/{datedebut}/{dateend}",name="_between",methods={"GET"})
     */
    public function between(CoursRepository $repository,$datedebut,$dateend) :Response
    {
        

        $datetime = new \DateTime();
        $debut = $datetime->createFromFormat('d-m-Y', $datedebut);
        $end = $datetime->createFromFormat('d-m-Y', $dateend);


        $cours = $repository->getByDateBetween($debut,$end);

        return $this->json($cours,200);

    }

    /**
     * @Route("/classe/{id}/between/{datedebut}/{dateend}",name="_between_by_classe",methods={"GET"})
     */
    public function betweenByClasse(CoursRepository $repository,Classe $classe = null,$datedebut,$dateend) :Response
    {
        if(!$classe){
            return new JsonResponse([
                "message" => "Classe inexistante"
            ], 404);
        }
        $datetime = new \DateTime();
        $debut = $datetime->createFromFormat('d-m-Y', $datedebut);
        $end = $datetime->createFromFormat('d-m-Y', $dateend);


        $cours = $repository->getByDateBetween($debut,$end,$classe);

        return $this->json($cours,200);

    }

    /**
     * @Route("/days/{nb_add_days}",name="_add_days",methods={"GET"})
     */
    public function addDays(CoursRepository $repository,int $nb_add_days) :Response
    {
        $datetime = new \DateTime();
        $date = $datetime->modify('+'.$nb_add_days.' day');

        $cours = $repository->getByDate($date);


        return $this->json($cours,200);

    }

    /**
     * @Route("/classe/{id}/days/{nb_add_days}",name="_add_days_by_classe",methods={"GET"})
     */
    public function addDaysByClasse(Classe $classe = null,CoursRepository $repository,int $nb_add_days) :Response
    {
        if(!$classe){
            return new JsonResponse([
                "message" => "Classe inexistante"
            ], 404);
        }
        $datetime = new \DateTime();
        $date = $datetime->modify('+'.$nb_add_days.' day');

        $cours = $repository->getByDate($date,$classe);


        return $this->json($cours,200);

    }

    /**
     * @Route("", name="create_cours", methods={"POST"})
     */
    public function createCours(Request $request,ValidatorInterface $validator,EntityManagerInterface $em,ProfesseurRepository $pr,MatiereRepository $mr,SalleRepository $sr,ClasseRepository $cr)
    {
        $data = json_decode($request->getContent(), true);
        $prof = $pr->find($data["professeur"]);
        $matiere = $mr->find($data["matiere"]);
        $salle = $sr->find($data["salle"]);
        $classe = $cr->find($data["classe"]);

        $data["professeur"] = $prof;
        $data["matiere"] = $matiere;
        $data["salle"] = $salle;
        $data["classe"] = $classe;
        $cours = new Cours($data);
        
        $errors = $validator->validate($cours);

        if ($errors->count() > 0){
            $messages = [];
            foreach($errors as $error){
                $messages[$error->getPropertyPath()] = $error->getMessage();
            }
            return $this->json($messages, 400);
        }
        $em->persist($cours);
        $em->flush();

        return $this->json($cours, 200);

    }
}
