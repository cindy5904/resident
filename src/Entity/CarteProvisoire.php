<?php

namespace App\Entity;

use App\Repository\CarteProvisoireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteProvisoireRepository::class)]
class CarteProvisoire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $civilite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroAdresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $carteGrise = null;

    #[ORM\Column(nullable: true)]
    private ?bool $justificatifMoins3Mois = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaires = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\ManyToOne]
    private ?ListeRueZoneBleue $adresse = null;

    #[ORM\ManyToOne]
    private ?PersonneQuiDelivre $delivreePar = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function isCarteGrise(): ?bool
    {
        return $this->carteGrise;
    }

    public function setCarteGrise(?bool $carteGrise): self
    {
        $this->carteGrise = $carteGrise;

        return $this;
    }

    public function isJustificatifMoins3Mois(): ?bool
    {
        return $this->justificatifMoins3Mois;
    }

    public function setJustificatifMoins3Mois(?bool $justificatifMoins3Mois): self
    {
        $this->justificatifMoins3Mois = $justificatifMoins3Mois;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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

    public function getDelivreePar(): ?PersonneQuiDelivre
    {
        return $this->delivreePar;
    }

    public function setDelivreePar(?PersonneQuiDelivre $delivreePar): self
    {
        $this->delivreePar = $delivreePar;

        return $this;
    }
}
