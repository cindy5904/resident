<?php

namespace App\Entity;

use App\Repository\ListeEntrepriseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeEntrepriseRepository::class)]
class ListeEntreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $denomination = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $activite = null;

    #[ORM\Column(nullable: true)]
    private ?int $totalSalarie = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaires = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeEntreprise = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroAdresse = null;

    #[ORM\ManyToOne]
    private ?ListeRueZoneBleue $adresse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDenomination(): ?string
    {
        return $this->denomination;
    }

    public function setDenomination(?string $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(?string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getTotalSalarie(): ?int
    {
        return $this->totalSalarie;
    }

    public function setTotalSalarie(?int $totalSalarie): self
    {
        $this->totalSalarie = $totalSalarie;

        return $this;
    }

    public function getCommentaires(): ?string
    {
        return $this->commentaires;
    }

    public function setCommentaires(?string $commentaires): self
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    public function getTypeEntreprise(): ?string
    {
        return $this->typeEntreprise;
    }

    public function setTypeEntreprise(?string $typeEntreprise): self
    {
        $this->typeEntreprise = $typeEntreprise;

        return $this;
    }

    public function getNumeroAdresse(): ?string
    {
        return $this->numeroAdresse;
    }

    public function setNumeroAdresse(?string $numeroAdresse): self
    {
        $this->numeroAdresse = $numeroAdresse;

        return $this;
    }

    public function getAdresse(): ?ListeRueZoneBleue
    {
        return $this->adresse;
    }

    public function setAdresse(?ListeRueZoneBleue $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
