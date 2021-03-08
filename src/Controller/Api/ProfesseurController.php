<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponses;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ProfesseurRepository;
use App\Entity\Professeur;
use App\Entity\Avis;
use App\Repository\AvisRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;


/**
 * @Route("/api/professeurs", name="api_professeurs_")
 */
class ProfesseurController extends AbstractController
{
    /** 
     * @Route("", name="index", methods={"GET"})
    */
    public function index(ProfesseurRepository $repository) :Response
    {
        $professeurs = $repository->findAll();

        // Méthode 1 : contruction de la réponse 
        $response = new Response;

        ////// Quand class n'implmente pas json (créer fct array)
        // $content = json_encode(array_map(function($professeur) {
        //     return $professeur->toArray();
        // },$professeurs));
        // $response->setContent($content);

        // avec méthode serialisable
        // $response->setContent(json_encode($professeurs));
        // $response->setStatusCode(200);
        // $response->headers->set("Content-Type","application/json");

        // return $response;

        return $this->json($professeurs,200);

    }

    /** 
     * @Route("/{id}", name="show", methods={"GET"})
    */
    public function detail(int $id,ProfesseurRepository $repository) :Response
    {
        $professeur = $repository->find($id);

        if(!$professeur) {
            return new JsonResponse([
                "message" => ProfesseurController::PROFESSEUR_NOT_FOUND_MESSAGE
            ], 404);
        }
        return $this->json($professeur,200);

    }

     /**
     * @Route("/{id}/avis", name="index_avis", methods={"GET"})
     */
    public function indexAvis(Professeur $professeur = null)
    {
        if (is_null($professeur)) {
            return $this->json([
                'message' => 'pas de professeur correspondant à cet id'
            ], 404);
        }

        return $this->json($professeur->getAvis()->toArray(), 200);
    }

    /**
     * @Route("/{id}/avis", name="create_avis", methods={"POST"})
     */
    public function createAvis(Request $request, Professeur $professeur = null,ValidatorInterface $validator,EntityManagerInterface $em)
    {
        $data = json_decode($request->getContent(), true);
        $data["professeur"] = $professeur;
        $avis = new Avis($data);

        $errors = $validator->validate($avis);

        if ($errors->count() > 0){
            $messages = [];
            foreach($errors as $error){
                $messages[$error->getPropertyPath()] = $error->getMessage();
            }
            return $this->json($messages, 400);
        }
        $em->persist($avis);
        $em->flush();

        return $this->json($avis, 200);

    }

    /**
     * @Route("/avis/{id}", name="delete_avis", methods={"DELETE"})
     */
    public function deleteAvis(Avis $avis = null,AvisRepository $em)
    {
        if(!$avis){
            return $this->json(["msg" =>"Cette avis n'existe pas"], 400);
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($avis);
        $em->flush();
        return $this->json(null, 204);

    }

    /**
     * @Route("/avis/{id}", name="update_avis", methods={"PATCH"})
     */
    public function updateAvis(Request $request, Avis $avis = null, ValidatorInterface $validator, EntityManagerInterface $em)
    {
        if (is_null($avis)) {
            return $this->json([
                'message' => 'Cet avis est introuvable',
            ], 404);
        }

        $data = json_decode($request->getContent(), true);
        $errors = $avis->updateFromArray($data);

        if (count($errors) > 0) {
            $messages = [];
            foreach ($errors as $attribute) {
                $messages[$attribute] = "Cet attribute n'existe pas.";
            }

            return $this->json($messages, 400);
        }

        $errors = $validator->validate($avis);

        if ($errors->count() > 0) {
            return $this->json($this->formatErrors($errors), 400);
        }

        $em->persist($avis);
        $em->flush();

        return $this->json($avis, 200);
    }

    protected function formatErrors($errors): array
    {
        $messages = [];
        foreach ($errors as $error) {
            $messages[$error->getPropertyPath()] = $error->getMessage();
        }

        return $messages;
    }
}
