<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use App\Repository\ProfesseurRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\CoursValidator as c_validator_; 
use App\Validator\Cours as c_validator; 


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


