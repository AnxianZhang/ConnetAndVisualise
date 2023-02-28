<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class IdentTask
{
    #[Assert\NotBlank(message: "Le champ name est obligatoire")]
    protected $name;
    #[Assert\NotBlank(message: "Le champ matricule est obligatoire")]
    protected $pwd;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPwd(): string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): void
    {
        $this->pwd = $pwd;
    }
}
