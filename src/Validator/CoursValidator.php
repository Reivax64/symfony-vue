<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use App\Repository\CoursRepository;

class CoursValidator extends ConstraintValidator
{
    private $coursRepository;

    public function __construct(CoursRepository $coursRepository)
    {
        $this->coursRepository = $coursRepository; // pour pouvoir récupérer le CoursRepository
    }
    public function validate($protocol, Constraint $constraint)
    {
        //vérifie si la date de fin est le même jours que la date du début 
        if($protocol->getDateHeureDebut()->format('d-m-Y') != $protocol->getDateHeureFin()->format('d-m-Y')){
            $this->context->buildViolation($constraint->messageDayDifferent)
            ->addViolation();
        }



        // vérifie si le prof possède la matière
        $canTeach = false;
        foreach($protocol->getProfesseur()->getMatieres() as $m){
            if($m->getId() == $protocol->getMatiere()->getId()){
                $canTeach = true;
            }
        }

        // si il ne peut pas, créer une erreur
        if($canTeach == false){
            $this->context->buildViolation($constraint->messageErrTeach)
            ->addViolation();
        }

        // récupère les cours qui ont lieu en même temps
        $cours_same_time = $this->coursRepository->getInSameCreneau($protocol->getDateHeureDebut(),$protocol->getDateHeureFin());

        $salle_non_dispo = false;
        $prof_non_dispo = false;
        $classe_non_dispo = false;

        foreach($cours_same_time as $cst){
            // vérifie si la salle est dispo
            if($cst->getSalle()->getId() == $protocol->getSalle()->getId()){
                $salle_non_dispo = true;
            }
            // vérifie si le prof est dispo
            if($cst->getProfesseur()->getId() == $protocol->getProfesseur()->getId()){
                $prof_non_dispo = true;
            }

            if($cst->getClasse()->getId() == $protocol->getClasse()->getId()){
                $classe_non_dispo = true;
            }
        }

        //créer des erreurs dans les cas où le prof ou la salle n'est pas dispo
        if($salle_non_dispo){
            $this->context->buildViolation($constraint->messageSalleDejaPrise)
            ->addViolation();
        }

        if($prof_non_dispo){
            $this->context->buildViolation($constraint->messageProfDejaPris)
            ->addViolation();
        }

        if($classe_non_dispo){
            $this->context->buildViolation($constraint->messageClasseDejaPris)
            ->addViolation();
        }
    }
}
