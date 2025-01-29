<?php

namespace App\Entity;

use App\Repository\PetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PetRepository::class)]
class Pet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nome = null;

    #[ORM\Column(length: 50)]
    private ?string $raca = null;

    #[ORM\Column(length: 50)]
    private ?string $peso = null;

    #[ORM\Column(length: 50)]
    private ?string $idade = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getRaca(): ?string
    {
        return $this->raca;
    }

    public function setRaca(string $raca): static
    {
        $this->raca = $raca;

        return $this;
    }

    public function getPeso(): ?string
    {
        return $this->peso;
    }

    public function setPeso(string $peso): static
    {
        $this->peso = $peso;

        return $this;
    }

    public function getIdade(): ?string
    {
        return $this->idade;
    }

    public function setIdade(string $idade): static
    {
        $this->idade = $idade;

        return $this;
    }
}
