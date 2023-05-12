<?php

namespace App\Entity;

use App\Repository\CarteTravauxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarteTravauxRepository::class)]
class CarteTravaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomEntrepriseTravaux = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebutTravaux = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFinTravaux = null;
    
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroAdresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $carteGrise = null;

    #[ORM\Column(nullable: true)]
    private ?bool $devis = null;

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

    public function getNomEntrepriseTravaux(): ?string
    {
        return $this->nomEntrepriseTravaux;
    }

    public function setNomEntrepriseTravaux(?string $nomEntrepriseTravaux): self
    {
        $this->nomEntrepriseTravaux = $nomEntrepriseTravaux;

        return $this;
    }

    public function getDateDebutTravaux(): ?\DateTimeInterface
    {
        return $this->dateDebutTravaux;
    }

    public function setDateDebutTravaux(?\DateTimeInterface $dateDebutTravaux): self
    {
        $this->dateDebutTravaux = $dateDebutTravaux;

        return $this;
    }
    public function getDateFinTravaux(): ?\DateTimeInterface
    {
        return $this->dateFinTravaux;
    }

    public function setDateFinTravaux(?\DateTimeInterface $dateFinTravaux): self
    {
        $this->dateFinTravaux = $dateFinTravaux;

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

    public function isDevis(): ?bool
    {
        return $this->devis;
    }

    public function setDevis(?bool $devis): self
    {
        $this->devis = $devis;

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
