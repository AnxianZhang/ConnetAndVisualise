<?php

namespace App\Entity\DB;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\UserRepository::class)]
#[ORM\Table(name: 'utilisateur')]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name: "id_nom", type: "integer")]
    private ?int $idNom = null;

    #[ORM\Column(name: "nom", type: "text")]
    private string $nom;

    #[ORM\Column(name: "prenom", type: "text")]
    private string $prenom;

    #[ORM\Column(name: "num", type: "text")]
    private string $num;

    #[ORM\Column(name: "email", type: "text")]
    private string $email;

    public function getIdNom(): ?int
    {
        return $this->idNom;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getNum(): ?string
    {
        return $this->num;
    }

    public function setNum(string $num): self
    {
        $this->num = $num;
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
}
