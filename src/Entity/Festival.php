<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Festival
 *
 * @ORM\Table(name="festival")
 * @ORM\Entity
 */
class Festival
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomFestival", type="text", length=65535, nullable=false)
     */
    private $nomfestival;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="text", length=65535, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="text", length=65535, nullable=false)
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlaces", type="integer", nullable=false)
     */
    private $nbplaces;

    public function getId(): ?int //Retourne l'id
    {
        return $this->id;
    }
    public function getNomfestival(): ?string //Retourne le nom du festival
    {
        return $this->nomfestival;
    }
    public function setNomfestival(string $nomfestival): self //Change le nom du festival
    {
        $this->nomfestival = $nomfestival;
        return $this;
    }
    public function getDatedebut(): ?\DateTimeInterface //Retourne la date de début
    {
        return $this->datedebut;
    }
    public function setDatedebut(\DateTimeInterface $datedebut): self //Change la date de début
    {
        $this->datedebut = $datedebut;
        return $this;
    }
    public function getLieu(): ?string //Retourne le lieu
    {
        return $this->lieu;
    }
    public function setLieu(string $lieu): self //Change le lieu
    {
        $this->lieu = $lieu;
        return $this;
    }
    public function getGenre(): ?string //Retourne le genre
    {
        return $this->genre;
    }
    public function setGenre(string $genre): self //Change le genre
    {
        $this->genre = $genre;
        return $this;
    }
    public function getNbplaces(): ?int //Retourn le nombre de places 
    {
        return $this->nbplaces;
    }
    public function setNbplaces(int $nbplaces): self //Change le nombre de place 
    {
        $this->nbplaces = $nbplaces;
        return $this;
    }
    public function __toString() 
    {
        return $this->id.'-'.$this->nomfestival;
    }
}
