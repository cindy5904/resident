<?php

namespace App\Entity;

use App\Repository\ResidentsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

#[ORM\Entity(repositoryClass: ResidentsRepository::class)]
class Residents
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Civilite = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroAdresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $numeroAppartement = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $marqueVehicule = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $modele = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $immatriculation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaires = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $demandeCourrier = null;

    #[ORM\Column(nullable: true)]
    private ?bool $demandeInternet = null;

    #[ORM\Column(nullable: true)]
    private ?bool $voiePostale = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeMiseEnIncomplet = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeCompletude = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDeReponseAdministre = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroDossier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateEnvoiCarte = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $changementVehicule = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroCarte = null;

    #[ORM\Column(nullable: true)]
    private ?bool $attestationHonneur = null;

    #[ORM\ManyToOne]
    private ?ListeRueZoneBleue $adresse = null;

    #[ORM\ManyToOne]
    private ?ModeReglement $modeReglement = null;

    #[ORM\ManyToOne]
    private ?PersonneQuiDelivre $delivreePar = null;

    #[ORM\ManyToOne]
    private ?Montants $montant = null;

    #[ORM\ManyToOne]
    private ?VehiculeVert $vehiculeVert = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $carteSupprimee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?string
    {
        return $this->Civilite;
    }

    public function setCivilite(?string $Civilite): self
    {
        $this->Civilite = $Civilite;

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

    public function getNumeroAppartement(): ?string
    {
        return $this->numeroAppartement;
    }

    public function setNumeroAppartement(?string $numeroAppartement): self
    {
        $this->numeroAppartement = $numeroAppartement;

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

    public function isDemandeCourrier(): ?bool
    {
        return $this->demandeCourrier;
    }

    public function setDemandeCourrier(?bool $demandeCourrier): self
    {
        $this->demandeCourrier = $demandeCourrier;

        return $this;
    }

    public function isDemandeInternet(): ?bool
    {
        return $this->demandeInternet;
    }

    public function setDemandeInternet(?bool $demandeInternet): self
    {
        $this->demandeInternet = $demandeInternet;

        return $this;
    }

    public function isVoiePostale(): ?bool
    {
        return $this->voiePostale;
    }

    public function setVoiePostale(?bool $voiePostale): self
    {
        $this->voiePostale = $voiePostale;

        return $this;
    }

    public function getDateDeMiseEnIncomplet(): ?\DateTimeInterface
    {
        return $this->dateDeMiseEnIncomplet;
    }

    public function setDateDeMiseEnIncomplet(?\DateTimeInterface $dateDeMiseEnIncomplet): self
    {
        $this->dateDeMiseEnIncomplet = $dateDeMiseEnIncomplet;

        return $this;
    }

    public function getDateDeCompletude(): ?\DateTimeInterface
    {
        return $this->dateDeCompletude;
    }

    public function setDateDeCompletude(?\DateTimeInterface $dateDeCompletude): self
    {
        $this->dateDeCompletude = $dateDeCompletude;

        return $this;
    }

    public function getDateDeReponseAdministre(): ?\DateTimeInterface
    {
        return $this->dateDeReponseAdministre;
    }

    public function setDateDeReponseAdministre(?\DateTimeInterface $dateDeReponseAdministre): self
    {
        $this->dateDeReponseAdministre = $dateDeReponseAdministre;

        return $this;
    }

    public function getNumeroDossier(): ?int
    {
        return $this->numeroDossier;
    }

    public function setNumeroDossier(?int $numeroDossier): self
    {
        $this->numeroDossier = $numeroDossier;

        return $this;
    }

    public function getDateEnvoiCarte(): ?\DateTimeInterface
    {
        return $this->DateEnvoiCarte;
    }

    public function setDateEnvoiCarte(?\DateTimeInterface $DateEnvoiCarte): self
    {
        $this->DateEnvoiCarte = $DateEnvoiCarte;

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

    public function getNumeroCarte(): ?int
    {
        return $this->numeroCarte;
    }

    public function setNumeroCarte(?int $numeroCarte): self
    {
        $this->numeroCarte = $numeroCarte;

        return $this;
    }

    public function isAttestationHonneur(): ?bool
    {
        return $this->attestationHonneur;
    }

    public function setAttestationHonneur(?bool $attestationHonneur): self
    {
        $this->attestationHonneur = $attestationHonneur;

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

    public function getModeReglement(): ?ModeReglement
    {
        return $this->modeReglement;
    }

    public function setModeReglement(?ModeReglement $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

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

    public function getMontant(): ?Montants
    {
        return $this->montant;
    }

    public function setMontant(?Montants $montant): self
    {
        $this->montant = $montant;

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

    public function getCarteSupprimee(): ?string
    {
        return $this->carteSupprimee;
    }

    public function setCarteSupprimee(?string $carteSupprimee): self
    {
        $this->carteSupprimee = $carteSupprimee;

        return $this;
    }

}

        /**
     * @Annotation
     */
    class NumericCharacters extends Constraint
    {
        public $message = 'Le numéro d\'appartement doit contenir uniquement des caractères numériques.';
    }
    

    class NumericCharactersValidator extends ConstraintValidator
    {
        public function validate($value, Constraint $constraint)
        {
            if (!is_numeric($value)) {
                $this->context->buildViolation($constraint->message)
                    ->addViolation();
            }
        }
    }
