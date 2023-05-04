<?php

namespace App\Entity;

use App\Repository\VehiculeVertRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeVertRepository::class)]
class VehiculeVert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $typeVehicule = null;

    public function __toString()
    {
        return $this->typeVehicule;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeVehicule(): ?string
    {
        return $this->typeVehicule;
    }

    public function setTypeVehicule(?string $typeVehicule): self
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }
}
