<?php

namespace App\Entity\DB;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: \App\Repository\ContactRepository::class)]
#[ORM\Table(name: 'contact')]
#[ORM\Index(name: 'id_nom', columns: ['id_nom'])]
class Contact
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_nom', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private ?int $idNom = null;

    #[ORM\Id]
    #[ORM\Column(name: 'id_contact', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private ?int $idContact = null;

    public function getIdNom(): ?int
    {
        return $this->idNom;
    }

    public function setIdNom(int $idNom): self
    {
        $this->idNom = $idNom;
        return $this;
    }

    public function getIdContact(): ?int
    {
        return $this->idContact;
    }

    public function setIdContact(int $idContact): self
    {
        $this->idContact = $idContact;
        return $this;
    }
}
