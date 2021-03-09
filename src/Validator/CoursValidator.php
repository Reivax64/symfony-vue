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
        $this->coursRepository = $coursRepository;
    }
    public function validate($protocol, Constraint $constraint)
    {
        // vérifie si le prof possède la matière

        $canTeach = false;
        foreach($protocol->getProfesseur()->getMatieres() as $m){
            if($m->getId() == $protocol->getMatiere()->getId()){
                $canTeach = true;
            }
        }

        if($canTeach == false){
            $this->context->buildViolation($constraint->messageErrTeach)
            ->addViolation();
        }

        $cours_same_time = $this->coursRepository->getInSameCreneau($protocol->getDateHeureDebut(),$protocol->getDateHeureFin());
        

        $salle_non_dispo = false;
        $prof_non_dispo = false;

        foreach($cours_same_time as $cst){
            if($cst->getSalle()->getId() == $protocol->getSalle()->getId()){
                $salle_non_dispo = true;
            }
            if($cst->getProfesseur()->getId() == $protocol->getProfesseur()->getId()){
                $prof_non_dispo = true;
            }
        }

        if($salle_non_dispo){
            $this->context->buildViolation($constraint->messageSalleDejaPrise)
            ->addViolation();
        }

        if($prof_non_dispo){
            $this->context->buildViolation($constraint->messageProfDejaPris)
            ->addViolation();
        }
        // vérifie si un cours existe en même temps dans la même salle

        // vérifie si le prof donne déjà un cours en même temps
        
    }
}
