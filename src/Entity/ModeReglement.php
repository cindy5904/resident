<?php

namespace App\Entity;

use App\Repository\ModeReglementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModeReglementRepository::class)]
class ModeReglement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $modeReglement = null;

    public function __toString()
    {
        return $this->modeReglement;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModeReglement(): ?string
    {
        return $this->modeReglement;
    }

    public function setModeReglement(?string $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }
}
