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


**Le projet**
Nous avons réalisé toutes les consignes du projet. De plus, nous avons ajouté des classes permettant d'avoir plusieurs edt. Nous avons aussi mis la possibilité de créer un cours via une appel API. Mis une couleur en fond sur les cours. Crée Un validator personnalisé pour les cours. Mise en place d'autre api (/api/matiere && /api/classe). Mis en place des Field différent en fonction des critères demandés (ColorField par exemple). Mis la possiblité de voir les cours sur différentes dates... 

Nous aurions aimé pouvoir faire de l'authentification, et faire en sorte qu'un utilisateur soit lié à une classe. Mais nous n'avions pas eu le temps.

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

Nous voyons une fonction getInSameCreneau() de cours repository, en effet, nous avons du créer une nouvelle fonction permettant de récupérer les cours dans le même créneau qu'une date donnée : 


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

Maintenat, pour binder notre validator à notre objet cours, nous utiliserons l'anotation : 
```PHP
    /**
     * @ORM\Entity(repositoryClass=CoursRepository::class)
     * @c_validator
     */

```
devant notre classe cours.


**les erreurs rencontrées pendant cette partie :** 
- Nous avons mis du temps à comprendre comment faire en sorte de passer une validator à notre objet cours.
- Utiliser le coursRepository dans notre validator n'était pas possible sans passer par le constructeur.
- Les erreurs s'affichent bien en se commulant dans l'admin CRUD, mais lors de l'envoie à l'api, elle ne se cummule pas. Nous n'avons pas encore trouvé de solution.



Maintenant nous pouvons créer nos fonctions CRUD : 


### Création des fonctions CRUD dans /admin

La création des crud se fait assez facilement grâce au cmd. 
Mais dans ce chapitre nous verons plus précisément, l'affichage des inputs dans CoursCrudController.


```PHP
    public function configureFields(string $pageName): iterable
    {
        return [
            'dateHeureDebut',
            'dateHeureFin',
            ChoiceField::new('type')->setChoices(["COURS"=> "COURS", "TP" => "TP", "TD" => "TD"])->renderAsNativeWidget(),
            ColorField::new('couleur'),
            AssociationField::new('salle')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('classe')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('professeur')->setFormTypeOptions(['by_reference' => false]),
            AssociationField::new('matiere')->setFormTypeOptions(['by_reference' => false]),
        ];
    }
```
Nous avons donc du surchargé la méthode configureFields, Pour faire en sorte de respecter plusieurs critères : 
- Un choiceFields pour le **type** de corus (TD/TP/COURS) afin d'éviter d'avoir trop de type différent.
- Un ColorField, permettant de choisir une couleur de fond pour les **cours**.
- AssiciationField pour **salle**, **classe**, **professeur** & **matiere**. Permettant de ne pas renseigner des données qui n'existe pas

**les erreurs rencontrées pendant cette partie :** 
- Pas beaucoup d'erreur en particulier, mais nous aurions aimé pouvoir initialiser les minutes de nos DatetimeField à 00 ou 30, afin de faciliter la saisi. Mais par manque de temps, nous n'avons pas réussi. 



### API

Pour faire ne sorte de communiquer avec le front, nous avons donc du créer plusieurs API. Certaines, plus poussées que d'autres. 

Commençons par les plus simples, qui implémenterons seulement des méthods GET pour récupérer des données. Ici, les salles, les classes et les matieres.

**/api/MatiereController**

```PHP
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
```
Route : /api/matiere
Methods : get
Code: 200. 

Récupère toutes les matières & les renvoies sous forme JSON. 
Pour ce faire, nous avons du implémenté la fonction JsonSerialise dans Entity\Matiere.php

```PHP 
public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'titre' => $this->titre,
            'reference' => $this->reference,
        ];
    }
```

**/api/ClasseController**

```PHP
   /**
  * @Route("/api/classe", name="api_classe_")
  */
    class ClasseController extends AbstractController
    {
        /**
         * @Route("",name="index",methods={"GET"})
         */
        public function index(ClasseRepository $repository): Response
        {
            $classes = $repository->findAll();

            return $this->json($classes,200);
        }
    }
```
Route : /api/classe
Methods : get
Code: 200. 

Récupère toutes les classes & les renvoies sous forme JSON. 
Pour ce faire, nous avons du implémenté la fonction JsonSerialise dans Entity\Classe.php

```PHP 
public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
        ];
    }
```

**/api/SalleController**

```PHP

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
```
1 - 

Route : /api/salles
Methods : get
Code: 200. 

Récupère toutes les salles & les renvoies sous forme JSON. 

2 - 

Route : /api/salles/{id}
Methods : get
Code: 200 ou 404 si la salle n'existe pas

Récupère la salle & la renvoie sous forme JSON. 


Pour ce faire, nous avons du implémenté la fonction JsonSerialise dans Entity\Classe.php

```PHP 
public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
        ];
    }
```


Maintenant, plus complexe. L'api de cours: 

**/api/CoursController**

Nous avons du séparer notre api en 2 étapes, récupérer les cours dans classes (donc, tous les cours) et les récupérer, par classe.

Déjà, commençons pas la déclaration de l'url en /api/cours : 

```PHP 
 /**
  * @Route("/api/cours", name="api_cours")
  */
class CoursController extends AbstractController
{
```

**Listing**


```PHP 
 /**
     * @Route("",name="",methods={"GET"})
     */
    public function index(CoursRepository $repository) :Response
    {
        $cours = $repository->findAll();

        return $this->json($cours,200);

    }
```
Route : /api/cours
Methods : get
Code: 200

Récupère tous les cours de toutes les classes & les renvoies sous forme JSON. 

```PHP 
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
```
Route : /api/cours/classe/{id}
Methods : get
Code: 200 ou 404 si la classe n'existe pas

Récupère tous les cours en fonction de la classe & les renvoies sous forme JSON. 

Ces routes ne seront pas très utile pour le Front, mais pour débuguer, elles le seront.


**Listing du jour**

```PHP 
    /**
     * @Route("/today",name="_today",methods={"GET"})
     */
    public function today(CoursRepository $repository) :Response
    {
        $now = new \DateTime();

        $cours = $repository->getByDate($now);

        return $this->json($cours,200);

    }
```

Route : /api/cours/today
Methods : get
Code: 200

Récupère tous les cours du jour actuel & les renvoies sous forme JSON. 


```PHP 
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
```

Route : /api/cours/classe/{id}/today
Methods : get
Code: 200 ou 404 

Récupère tous les cours du jour actuel par classe & les renvoies sous forme JSON. 

**listing entre 2 dates**


```PHP 
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
```

Route : /api/cours/between/{datedebut}/{dateend}
Methods : get
Code: 200

Récupère tous les cours entre 2 dates & les renvoies sous forme JSON. 


```PHP 
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
```

Route : /api/cours/classe/{id}/between/{datedebut}/{dateend}
Methods : get
Code: 200 ou 404

Récupère tous les cours entre 2 dates par classe & les renvoies sous forme JSON. 

**listing par jour sur un jour incrémenté**



```PHP 
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
```

Route : /api/cours/days/{nb_days}
Methods : get
Code: 200

Récupère tous les cours du jour actuel + nb_jour & les renvoies sous forme JSON. 


```PHP 
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
```

Route : /api/cours/classe/{id}/days/{nb_days}
Methods : get
Code: 200 ou 404

Récupère tous les cours du jour actuel + nb_jour par classe & les renvoies sous forme JSON. 


**Création d'un cours**



```PHP 
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
```

Route : /api/cours
Methods : post
Code: 200 ou 400

Permet de créer un cours depuis un appel ajax en méthode Post



**Pour réaliser cette api, nous avons du** 
- Créer des fonctions dans le Repository de cours : 

```PHP 
   public function getByDate(\Datetime $date, Classe $classe = null)
    {
        $from = new \DateTime($date->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($date->format("Y-m-d")." 23:59:59");

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
        ;
        if($classe){
            $qb->andWhere('e.classe = :classe')->setParameter('classe',  $classe->getId() );
        }
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function getByDateBetween(\Datetime $datedebut,\Datetime $datefin, Classe $classe = null)
    {
        $from = new \DateTime($datedebut->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($datefin->format("Y-m-d")." 23:59:59");

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.dateHeureDebut BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
        ;
        if($classe){
            $qb->andWhere('e.classe = :classe')->setParameter('classe',  $classe->getId() );
        }
        $result = $qb->getQuery()->getResult();

        return $result;
    }
```

- Modifier le constructeur de Cours.php pour construire un Cours via un tableau: 
```PHP 
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
```
- mettre des Serialise dans toutes les classes impliquées.

**Liste des erreurs et problèmes rencontrés** 
- Du jour au lendemain, la route index ne répondait plus si nous métions un name. Nous n'avons toujours pas compris pourquoi. Alors que sur les autres api tous marches super. (Ceci était avec d'avoir les routes par classe, donc, pas de soucis de polymorphisme)
- Les messages d'erreur liés à la création d'un cours ne se cummule pas.
- Nous voulions faire des routes plus propre, comme par exemple /cours/today = renvoie les routes de la journée de toutes les classes. /cours/today/{id} = renvoie les cours de la journée de la classe choisit. Mais, des erreurs de conversion nous ont vite fait changé d'avis. Certainement du au faite que nous avons des routes demandant des datetimes. Qui prenaient visiblemnt le dessus par certain moment.


