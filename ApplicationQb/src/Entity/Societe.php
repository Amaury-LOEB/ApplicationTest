<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocieteRepository")
 */
class Societe
{
    const MOINS_DE_10_SALARIES = "Moins de 10 salariés";
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cpSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complementAdresseSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $faxSociete;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreationFicheSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activiteSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeClient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $privePublic;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroSiret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $internet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailSociete;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $effectifSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numTvaSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statutSociete;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tailleSociete;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contact", inversedBy="societe")
     */
    private $contact;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Affaire", inversedBy="societe")
     */
    private $affaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groupe", inversedBy="societe")
     */
    private $groupe;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Facturation", inversedBy="societe")
     */
    private $facturation;

    public function __construct()
    {
        $this->contact = new ArrayCollection();
        $this->affaire = new ArrayCollection();
        $this->facturation = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSociete(): ?string
    {
        return $this->nomSociete;
    }

    public function setNomSociete(string $nomSociete): self
    {
        $this->nomSociete = $nomSociete;

        return $this;
    }

    public function getVilleSociete(): ?string
    {
        return $this->villeSociete;
    }

    public function setVilleSociete(?string $villeSociete): self
    {
        $this->villeSociete = $villeSociete;

        return $this;
    }

    public function getCpSociete(): ?string
    {
        return $this->cpSociete;
    }

    public function setCpSociete(?string $cpSociete): self
    {
        $this->cpSociete = $cpSociete;

        return $this;
    }

    public function getAdresseSociete(): ?string
    {
        return $this->adresseSociete;
    }

    public function setAdresseSociete(?string $adresseSociete): self
    {
        $this->adresseSociete = $adresseSociete;

        return $this;
    }

    public function getComplementAdresseSociete(): ?string
    {
        return $this->complementAdresseSociete;
    }

    public function setComplementAdresseSociete(?string $complementAdresseSociete): self
    {
        $this->complementAdresseSociete = $complementAdresseSociete;

        return $this;
    }

    public function getPaysSociete(): ?string
    {
        return $this->paysSociete;
    }

    public function setPaysSociete(?string $paysSociete): self
    {
        $this->paysSociete = $paysSociete;

        return $this;
    }

    public function getTelephoneSociete(): ?string
    {
        return $this->telephoneSociete;
    }

    public function setTelephoneSociete(string $telephoneSociete): self
    {
        $this->telephoneSociete = $telephoneSociete;

        return $this;
    }

    public function getFaxSociete(): ?string
    {
        return $this->faxSociete;
    }

    public function setFaxSociete(?string $faxSociete): self
    {
        $this->faxSociete = $faxSociete;

        return $this;
    }

    public function getDateCreationFicheSociete(): ?\DateTimeInterface
    {
        return $this->dateCreationFicheSociete;
    }

    public function setDateCreationFicheSociete(\DateTimeInterface $dateCreationFicheSociete): self
    {
        $this->dateCreationFicheSociete = $dateCreationFicheSociete;

        return $this;
    }

    public function getActiviteSociete(): ?string
    {
        return $this->activiteSociete;
    }

    public function setActiviteSociete(?string $activiteSociete): self
    {
        $this->activiteSociete = $activiteSociete;

        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->typeClient;
    }

    public function setTypeClient(?string $typeClient): self
    {
        $this->typeClient = $typeClient;

        return $this;
    }

    public function getPrivePublic(): ?string
    {
        return $this->privePublic;
    }

    public function setPrivePublic(?string $privePublic): self
    {
        $this->privePublic = $privePublic;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNumeroSiret(): ?string
    {
        return $this->numeroSiret;
    }

    public function setNumeroSiret(?string $numeroSiret): self
    {
        $this->numeroSiret = $numeroSiret;

        return $this;
    }

    public function getInternet(): ?string
    {
        return $this->internet;
    }

    public function setInternet(?string $internet): self
    {
        $this->internet = $internet;

        return $this;
    }

    public function getEmailSociete(): ?string
    {
        return $this->emailSociete;
    }

    public function setEmailSociete(?string $emailSociete): self
    {
        $this->emailSociete = $emailSociete;

        return $this;
    }

    public function getEffectifSociete(): ?int
    {
        return $this->effectifSociete;
    }

    public function setEffectifSociete(?int $effectifSociete): self
    {
        $this->effectifSociete = $effectifSociete;

        return $this;
    }

    public function getNumTvaSociete(): ?string
    {
        return $this->numTvaSociete;
    }

    public function setNumTvaSociete(?string $numTvaSociete): self
    {
        $this->numTvaSociete = $numTvaSociete;

        return $this;
    }

    public function getStatutSociete(): ?string
    {
        return $this->statutSociete;
    }

    public function setStatutSociete(?string $statutSociete): self
    {
        $this->statutSociete = $statutSociete;

        return $this;
    }

    public function getTailleSociete(): ?string
    {
        return $this->tailleSociete;
    }

    public function setTailleSociete(?string $tailleSociete): self
    {
        $this->tailleSociete = $tailleSociete;

        return $this;
    }

    /**
     * @return Collection|contact[]
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(contact $contact): self
    {
        if (!$this->contact->contains($contact)) {
            $this->contact[] = $contact;
        }

        return $this;
    }

    public function removeContact(contact $contact): self
    {
        if ($this->contact->contains($contact)) {
            $this->contact->removeElement($contact);
        }

        return $this;
    }

    /**
     * @return Collection|affaire[]
     */
    public function getAffaire(): Collection
    {
        return $this->affaire;
    }

    public function addAffaire(affaire $affaire): self
    {
        if (!$this->affaire->contains($affaire)) {
            $this->affaire[] = $affaire;
        }

        return $this;
    }

    public function removeAffaire(affaire $affaire): self
    {
        if ($this->affaire->contains($affaire)) {
            $this->affaire->removeElement($affaire);
        }

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function getNomGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * @return Collection|facturation[]
     */
    public function getFacturation(): Collection
    {
        return $this->facturation;
    }

    public function addFacturation(facturation $facturation): self
    {
        if (!$this->facturation->contains($facturation)) {
            $this->facturation[] = $facturation;
        }

        return $this;
    }

    public function removeFacturation(facturation $facturation): self
    {
        if ($this->facturation->contains($facturation)) {
            $this->facturation->removeElement($facturation);
        }

        return $this;
    }

}
