<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class InscriptionTask{
    #[Assert\NotBlank(message: "Le champ first name est obligatoire")]
    private $nom;
    #[Assert\NotBlank(message: "Le champ last name est obligatoire")]
    private $prenom;
    #[Assert\NotBlank(message: "Le champ email est obligatoire")]
    private $email;
    #[Assert\NotBlank(message: "Le champ password est obligatoire")]
    private $num;
    #[Assert\NotBlank(message: "Le champ comfirm password est obligatoire")]
    private $confirmeNum;

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getNum(): string
    {
        return $this->num;
    }

    public function setNum(string $num): void
    {
        $this->num = $num;
    }

    public function getConfirmeNum(): string
    {
        return $this->confirmeNum;
    }

    public function setConfirmeNum(string $confirmeNum): void
    {
        $this->confirmeNum = $confirmeNum;
    }
}