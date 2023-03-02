<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class InscriptionTask{
    #[Assert\NotBlank(message: 'Required field')]
    private $nom;

    #[Assert\NotBlank(message: 'Required field')]
    private $prenom;

    #[Assert\Email(message: "Le format du mail est non valid")]
    #[Assert\NotBlank()]
    private $email;

    #[Assert\Length(min: 8, minMessage: 'The password must be more than 8 carracters')]
    #[Assert\NotBlank()]
    private $num;

    #[Assert\EqualTo(propertyPath: "num", message: 'The value does not match the password')]
    #[Assert\NotBlank()]
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