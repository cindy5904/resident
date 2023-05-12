<?php

namespace App\Entity;

use App\Repository\TravailleurDomicileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TravailleurDomicileRepository::class)]
class TravailleurDomicile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $civilite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroAdresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $marqueVehicule = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation2022 = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroCarte = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaires = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $changementVehicule = null;

    #[ORM\Column(nullable: true)]
    private ?int $carteSupprimee = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateCreation2023 = null;

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

    public function getMarqueVehicule(): ?string
    {
        return $this->marqueVehicule;
    }

    public function setMarqueVehicule(?string $marqueVehicule): self
    {
        $this->marqueVehicule = $marqueVehicule;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

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

    public function getDateCreation2022(): ?\DateTimeInterface
    {
        return $this->dateCreation2022;
    }

    public function setDateCreation2022(?\DateTimeInterface $dateCreation2022): self
    {
        $this->dateCreation2022 = $dateCreation2022;

        return $this;
    }

    public function getNumeroCarte(): ?int
    {
        return $this->numeroCarte;
    }

    public function setNumeroCarte(?int $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

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

    public function getChangementVehicule(): ?string
    {
        return $this->changementVehicule;
    }

    public function setChangementVehicule(?string $changementVehicule): self
    {
        $this->changementVehicule = $changementVehicule;

        return $this;
    }

    public function getCarteSupprimee(): ?int
    {
        return $this->carteSupprimee;
    }

    public function setCarteSupprimee(?int $carteSupprimee): self
    {
        $this->carteSupprimee = $carteSupprimee;

        return $this;
    }

    public function getDateCreation2023(): ?\DateTimeInterface
    {
        return $this->DateCreation2023;
    }

    public function setDateCreation2023(?\DateTimeInterface $DateCreation2023): self
    {
        $this->DateCreation2023 = $DateCreation2023;

        return $this;
    }
}
