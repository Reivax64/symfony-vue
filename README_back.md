#symfony-vue

#Back Office 


## Base de donnée / Entity : 
Création de 2 entity : 
    Cours & salle 


Création des fonctions CRUD dans /admin 


## Validator pour Cours : 
 création : php bin/console make:validator 

### Validator/Cours.php
'''

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Cours extends Constraint
{
    // les messages d'erreur disponible
    public $message = 'The value is not valid.';
    public $messageErrTeach = 'Le professeur ne peut pas enseigner cette matière';
    public $messageSalleDejaPrise = 'Cette salle est déjà prise';
    public $messageProfDejaPris = 'Ce prof est déjà prise';
    public $messageDayDifferent = 'Un cours ne peux pas être sur plusieurs jours';


    
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
    
    //pour pouvoir liée a une class
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
'''

### Validator/CoursValidator.php : 

'''
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

        foreach($cours_same_time as $cst){
            // vérifie si la salle est dispo
            if($cst->getSalle()->getId() == $protocol->getSalle()->getId()){
                $salle_non_dispo = true;
            }
            // vérifie si le prof est dispo
            if($cst->getProfesseur()->getId() == $protocol->getProfesseur()->getId()){
                $prof_non_dispo = true;
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
    }
}
'''

dans CoursRepository : 
'''
    public function getInSameCreneau(\Datetime $datedebut,\Datetime $datefin)
        {
            $from = new \DateTime($datedebut->format("Y-m-d H:i:s"));
            $to   = new \DateTime($datefin->format("Y-m-d H:i:s"));

            $qb = $this->createQueryBuilder("e");
            $qb
                ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
                ->orWhere('e.dateHeureFin BETWEEN :from AND :to')
                ->setParameter('from', $from )
                ->setParameter('to', $to)
            ;
            $result = $qb->getQuery()->getResult();

            return $result;
        }
'''

et enfin dans Entity\Cours : 

'''
use App\Validator\Cours as c_validator; 


/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 * @c_validator
 */
class Cours implements \JsonSerializable
{
'''

## API

### Cours 

Création d'un controlleur /Controller/API/CoursController.php qui répondra à l'url /api/cours
route : 
@Route("/api/cours", name="api_cours_")



url : /api/cours ==> renvoie listing de tous les cours 
route : 
    @Route("",name="index",methods={"GET"})
code : 
'''
    public function index(CoursRepository $repository) :Response
    {
        $cours = $repository->findAll(); // récupère tous les cours

        return $this->json($cours,200); // renvoie la list

    }
    '''

url : /api/cours/today => récuère les cours du jour
    route : 
        @Route("/today",name="_today",methods={"GET"})
    code : 
    '''
        public function today(CoursRepository $repository) :Response
        {
            $now = new \DateTime(); //init date du jour

            $cours = $repository->getByDate($now); //récupère les cours en fonction d'une date

            return $this->json($cours,200); //renvoie la lst 

        }
        '''
    dans CoursRepository : ajouter une fct qui cherche par date 
    '''
    public function getByDate(\Datetime $date)
        {
            $from = new \DateTime($date->format("Y-m-d")." 00:00:00"); // prend la première valeur
            $to   = new \DateTime($date->format("Y-m-d")." 23:59:59"); // et la dernière

            $qb = $this->createQueryBuilder("e"); //construit notr requete
            $qb
                ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
                ->setParameter('from', $from )
                ->setParameter('to', $to)
            ;
            $result = $qb->getQuery()->getResult();

            return $result;
        }
        '''


url : /api/cours/between/XX-XX-XXXX/XX-XX-XXXX => récupère les cours entre 2 dates
    route : 
        @Route("/between/{datedebut}/{dateend}",name="_between",methods={"GET"}
    code : 
        '''
        public function between(CoursRepository $repository,$datedebut,$dateend) :Response
        {
            $datetime = new \DateTime();
            $debut = $datetime->createFromFormat('d-m-Y', $datedebut); // 
            $end = $datetime->createFromFormat('d-m-Y', $dateend);

            $cours = $repository->getByDateBetween($debut,$end); // récupère es cours entre 2 dates

            return $this->json($cours,200); // renvoie la liste

        }
        '''
    dans CoursRepository : ajouter une fct qui cherche entre 2 date
    '''
    public function getByDateBetween(\Datetime $datedebut,\Datetime $datefin)
        {
            $from = new \DateTime($datedebut->format("Y-m-d")." 00:00:00");
            $to   = new \DateTime($datefin->format("Y-m-d")." 23:59:59");

            $qb = $this->createQueryBuilder("e");
            $qb
                ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
                ->setParameter('from', $from )
                ->setParameter('to', $to)
            ;
            $result = $qb->getQuery()->getResult();

            return $result;
        }
        '''

url : /api/cours/days/X => récupère les cours en fonction de la date d'aujourd'hui + X jours
    route : 
        @Route("/days/{nb_add_days}",name="_add_days",methods={"GET"})

    code : 
    '''
        public function addDays(CoursRepository $repository,int $nb_add_days) :Response
        {
            $datetime = new \DateTime();
            $date = $datetime->modify('+'.$nb_add_days.' day');

            $cours = $repository->getByDate($date);


            return $this->json($cours,200);

        }
    '''
