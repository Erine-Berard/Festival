<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Contact
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $message;

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    

}
