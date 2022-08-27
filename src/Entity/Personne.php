<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $cretedAt = null;

    public function __construct(){
        $this->cretedAt= new \DateTimeImmutable;
    }
   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCretedAt(): ?\DateTimeImmutable
    {
        return $this->cretedAt;
    }

    public function setCretedAt(\DateTimeImmutable $cretedAt): self
    {
        $this->cretedAt = $cretedAt;

        return $this;
    }
}
