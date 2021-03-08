<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
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
     * @ORM\ManyToOne(targetEntity=Salle::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity=Professeur::class, inversedBy="cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $professeur;

    /**
     * @ORM\ManyToOne(targetEntity=Matiere::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;

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
            "matiere" => $this->matiere,
            "salle" => $this->salle,
        ];
    }
}
