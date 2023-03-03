<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class AddContactTask
{
    #[Assert\NotBlank(message: "Le champ prenom est obligatoire")]
    private $firtName;

    #[Assert\NotBlank(message: "Le champ nom est obligatoire")]
    private $lastName;

    #[Assert\NotBlank()]
    #[Assert\Email(message: "Unvalid mail format")]
    private $email;

    public function getFirstName(): string
    {
        return $this->firtName;
    }

    public function setFirstName(string $fname): void
    {
        $this->firtName = $fname;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lname): void
    {
        $this->lastName = $lname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
