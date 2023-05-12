<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $marqueVehicule = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $carteGrise = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaires = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $changementVehicule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carteSupprimee = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation2022 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation2023 = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroDeCarte = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function isCarteGrise(): ?bool
    {
        return $this->carteGrise;
    }

    public function setCarteGrise(?bool $carteGrise): self
    {
        $this->carteGrise = $carteGrise;

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

    public function getCarteSupprimee(): ?string
    {
        return $this->carteSupprimee;
    }

    public function setCarteSupprimee(?string $carteSupprimee): self
    {
        $this->carteSupprimee = $carteSupprimee;

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

    public function getDateCreation2023(): ?\DateTimeInterface
    {
        return $this->dateCreation2023;
    }

    public function setDateCreation2023(?\DateTimeInterface $dateCreation2023): self
    {
        $this->dateCreation2023 = $dateCreation2023;

        return $this;
    }

    public function getNumeroDeCarte(): ?int
    {
        return $this->numeroDeCarte;
    }

    public function setNumeroDeCarte(?int $numeroDeCarte): self
    {
        $this->numeroDeCarte = $numeroDeCarte;

        return $this;
    }
}
