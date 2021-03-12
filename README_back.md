# Initialisation projet


## Création base de donnée : 

- Terminal dans la racine du projet : 

**Lancer :** 
php bin/console doctrine:database:create

**puis :**
php bin/console doctrine:schema:update --force 


Une base de donnée au nom de "edt_remy_xavier_projet" sera alors créée. 

## Puis lancer le serveur : 

**allez dans (avec un terminal)**

 /public 

**lancer :** 

php -S localhost:8022 (par exemple)


Maintenant, allez sur votre navigateur, dans l'url http://localhost:8022/admin


Créez au minimum 1 classe, 1 matière, 1 salle & 1 professeur


Vous pouvez maintenant créer autant de cours que vous voulez en respectant certaine contrainte imposées par un Validator : 


**Des cours à la même heure & date :**

- Ne peuvent pas avoir le même prof

- Ne peuvent pas avoir la même salle 

- Ne peuvent pas avoir la même classe


- Un professeur ne peut pas enseigner une matière qu'il ne possède pas 

- Un cours ne peut pas être sur plusieurs jours
- la date de début doit forcément être plus petite que celle de fin


## Navigation : 


Vous pouvez maintenant allez sur http://localhost:8022/cours.html et voir ainsi votre edt. 


# Notre travail : 


## Back Office

### Base de donnée / Entity :
Nous avons donc ajouté 3 tables sous forme de 3 entity: 
- Salle : représentaion d'une salle de cours
- Classe : représentaion d'une classe (LP prog, Lp multimédia etc ...)
- Cours

Voici leurs contenus  : 


```PHP
/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 * @c_validator
 */
class Cours implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThan(propertyPath="dateHeureDebut", message="La date de fin ne peut pas être inférieure à la date de début")
     */
    private $dateHeureFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity=Salle::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity=Professeur::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=true)
     */
    private $professeur;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

    public function __construct(array $data = [])
    {
        if(isset($data["dateHeureDebut"])){
            $date = \DateTime::createFromFormat('d-m-Y H:i:s', $data["dateHeureDebut"]);
            $this->dateHeureDebut =$date;
            
        }
        if(isset($data["dateHeureFin"])){
            $dateF = \DateTime::createFromFormat('d-m-Y H:i:s', $data["dateHeureFin"]);
            $this->dateHeureFin =$dateF;
            
        }
        $this->type = $data["type"] ?? null;
        $this->couleur = $data["couleur"] ?? null;

        $this->salle = $data["salle"] ?? null;
        $this->professeur = $data["professeur"] ?? null;
        $this->matiere = $data["matiere"] ?? null;
        $this->classe = $data["classe"] ?? null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): self
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDateHeureFin(): ?\DateTimeInterface
    {
        return $this->dateHeureFin;
    }

    public function setDateHeureFin(\DateTimeInterface $dateHeureFin): self
    {
        $this->dateHeureFin = $dateHeureFin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getSalle(): ?salle
    {
        return $this->salle;
    }

    public function setSalle(?salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getProfesseur(): ?professeur
    {
        return $this->professeur;
    }

    public function setProfesseur(?professeur $professeur): self
    {
        $this->professeur = $professeur;

        return $this;
    }

    public function getMatiere(): ?matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getClasse(): ?classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function __toString()
    {
        return $this->DateHeureDebut + " " + $this->DateHeureFin;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'dateHeureDebut' => $this->dateHeureDebut->format("d-m-Y H:i:s"),
            'dateHeureFin' => $this->dateHeureFin->format("d-m-Y H:i:s"),
            "professeur" => $this->professeur,
            "couleur" => $this->couleur,
            "type" => $this->type,
            "matiere" => $this->matiere,
            "salle" => $this->salle,
            "classe" => $this->classe,
        ];
    }
    
}


**
 * @ORM\Entity(repositoryClass=SalleRepository::class)
 * @UniqueEntity("numero")
 */
class Salle implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $numero;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }


    public function __toString()
    {
        return $this->numero;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
        ];
    }
}




/**
 * @ORM\Entity(repositoryClass=ClasseRepository::class)
 * @UniqueEntity("nom")
 */
class Classe implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function __toString()
    {
        return $this->nom ;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
        ];
    }
}
```

Toutes les classes sont fille de JsonSerialize, ce qui va nous permettre ddee surcharger la méthode JsonSerialize() pour pouvoir renvoyer des données Json depuis notre Api, présentée dans un prochain chapitre. 

Les contraintes imposées par ce modèle : 

**Salle: :**
- Une salle a un numéro unique
**Classe :** 
- Une classe a un nom unique
**Cours :** 

**Des cours à la même heure & date :**

- Ne peuvent pas avoir le même prof
- Ne peuvent pas avoir la même salle 
- Ne peuvent pas avoir la même classe
- Un professeur ne peut pas enseigner une matière qu'il ne possède pas 
- Un cours ne peut pas être sur plusieurs jours
- la date de début doit forcément être plus petite que celle de fin

Valider toutes ces contraintes fut possible grâce à la création d'un validator personnalisé. Présenter dans le prochain chapitre.









### Validator pour Cours :

 création : ```bash php bin/console make:validator```

Ceci nous créer 2 fichiers :
- Validator/Cours.php : permet de stoquer les messages et les méthodes liées à une contrainte
- Validator/CoursValidator.php : permet de faire notre code de validation personnalisée

Par défaut, un validator construit pour être liée à attribut d'une classe, nous avons donc du modifier certaine fonction, comme la fonction validateBy() pour la faire correspondre à une classe, car dans cours, nous voulons comparer notre objet Cours avec un autre Object cours existant


**Validator/Cours.php :**

```PHP
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Cours extends Constraint
{
    public $message = 'The value is not valid.';
    public $messageErrTeach = 'Le professeur ne peut pas enseigner cette matière';
    public $messageSalleDejaPrise = 'Cette salle est déjà prise';
    public $messageProfDejaPris = 'Ce prof est déjà pris';
    public $messageClasseDejaPris = 'Classe non dispo';
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
```
Ici, nous voyons les différents messages à afficher lors d'une erreur grâce à 5 attributs

**Validator/CoursValidator.php :** 

```PHP

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
            // vérifie si la classe est disponible
            if($cst->getClasse()->getId() == $protocol->getClasse()->getId()){
                $classe_non_dispo = true;
            }
        }

        //créer des erreurs dans les cas où le prof ou la salle ou la classe n'est pas dispo
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

```
Voici le code qui va nous permettre de vérifier les erreurs de validation, le principe, prendre notre objet Cours courant ($protocol), prendre la liste des cours qui ont lieu à la même date, et vérifier si le professeur, la salle, et la classe sont différents.

Nous voyons aussi que dans le constructeur, nous avons du passer un objet CoursRepository, indispensable pour pouvoir chercher les cours. 

dans CoursRepository : 
```PHP
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
```
Création des fonctions CRUD dans /admin

## API

### Cours 

Création d'un controlleur /Controller/API/CoursController.php qui répondra à l'url /api/cours
route : 
@Route("/api/cours", name="api_cours_")



url : /api/cours ==> renvoie listing de tous les cours 
route : 
    @Route("",name="index",methods={"GET"})
code : 
```PHP
    public function index(CoursRepository $repository) :Response
    {
        $cours = $repository->findAll(); // récupère tous les cours

        return $this->json($cours,200); // renvoie la list

    }
```

url : /api/cours/today => récuère les cours du jour
    route : 
        @Route("/today",name="_today",methods={"GET"})
    code : 
```PHP
        public function today(CoursRepository $repository) :Response
        {
            $now = new \DateTime(); //init date du jour

            $cours = $repository->getByDate($now); //récupère les cours en fonction d'une date

            return $this->json($cours,200); //renvoie la lst 

        }
```
    dans CoursRepository : ajouter une fct qui cherche par date 
```PHP
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
```


url : /api/cours/between/XX-XX-XXXX/XX-XX-XXXX => récupère les cours entre 2 dates
    route : 
        @Route("/between/{datedebut}/{dateend}",name="_between",methods={"GET"}
    code : 
```PHP
        public function between(CoursRepository $repository,$datedebut,$dateend) :Response
        {
            $datetime = new \DateTime();
            $debut = $datetime->createFromFormat('d-m-Y', $datedebut); // 
            $end = $datetime->createFromFormat('d-m-Y', $dateend);

            $cours = $repository->getByDateBetween($debut,$end); // récupère es cours entre 2 dates

            return $this->json($cours,200); // renvoie la liste

        }
```
    dans CoursRepository : ajouter une fct qui cherche entre 2 date
```PHP
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
```

url : /api/cours/days/X => récupère les cours en fonction de la date d'aujourd'hui + X jours
    route : 
        @Route("/days/{nb_add_days}",name="_add_days",methods={"GET"})

    code : 
```PHP
        public function addDays(CoursRepository $repository,int $nb_add_days) :Response
        {
            $datetime = new \DateTime();
            $date = $datetime->modify('+'.$nb_add_days.' day');

            $cours = $repository->getByDate($date);


            return $this->json($cours,200);

        }
```
