<?php

namespace App\Entity;

use App\Repository\PersonneQuiDelivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneQuiDelivreRepository::class)]
class PersonneQuiDelivre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $delivreePar = null;

    public function __toString()
    {
        return $this->delivreePar;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDelivreePar(): ?string
    {
        return $this->delivreePar;
    }

    public function setDelivreePar(?string $delivreePar): self
    {
        $this->delivreePar = $delivreePar;

        return $this;
    }
}
