<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class AddContactTask
{
    #[Assert\NotBlank()]
    private $firstName;

    #[Assert\NotBlank()]
    private $lastName;

    #[Assert\NotBlank()]
    #[Assert\Email(message: "Unvalid mail format")]
    private $email;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $fname): void
    {
        $this->firstName = $fname;
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
