<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Cours extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'The value is not valid.';
    public $messageErrTeach = 'Le professeur ne peut pas enseigner cette matière';
    public $messageSalleDejaPrise = 'Cette salle est déjà prise';
    public $messageProfDejaPris = 'Ce prof est déjà prise';
    public $messageDayDifferent = 'Un cours ne peux pas être sur plusieurs jours';


    
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
    

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
