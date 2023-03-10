<?php
namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ContactUsTask
{
    #[Assert\NotBlank()]
    private $subject;

    #[Assert\NotBlank()]
    private $text;

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}