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
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroCarte = null;

    #[ORM\ManyToOne]
    private ?ListeEntreprise $denomination = null;

    #[ORM\ManyToOne]
    private ?ModeReglement $modeReglement = null;

    #[ORM\ManyToOne]
    private ?VehiculeVert $vehiculeVert = null;

    #[ORM\ManyToOne]
    private ?MontantPro $montant = null;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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

    public function getDenomination(): ?ListeEntreprise
    {
        return $this->denomination;
    }

    public function setDenomination(?ListeEntreprise $denomination): self
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getModeReglement(): ?ModeReglement
    {
        return $this->modeReglement;
    }

    public function setModeReglement(?ModeReglement $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    public function getVehiculeVert(): ?VehiculeVert
    {
        return $this->vehiculeVert;
    }

    public function setVehiculeVert(?VehiculeVert $vehiculeVert): self
    {
        $this->vehiculeVert = $vehiculeVert;

        return $this;
    }

    public function getMontant(): ?MontantPro
    {
        return $this->montant;
    }

    public function setMontant(?MontantPro $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
}
