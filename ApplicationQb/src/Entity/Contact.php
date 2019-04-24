<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomContact;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fonctionDansSocieteContact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $civiliteContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephonePortableContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseCompleteContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observationContact;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enActiviteContact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codeClientContact;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Societe", mappedBy="contact")
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contactaffaire", mappedBy="contact", orphanRemoval=true)
     */
    private $contactAffaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Systeme", mappedBy="contact")
     */
    private $systeme;

    public function __construct()
    {
        $this->societe = new ArrayCollection();
        $this->contactAffaire = new ArrayCollection();
        $this->systeme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getFonctionDansSocieteContact(): ?string
    {
        return $this->fonctionDansSocieteContact;
    }

    public function setFonctionDansSocieteContact(?string $fonctionDansSocieteContact): self
    {
        $this->fonctionDansSocieteContact = $fonctionDansSocieteContact;

        return $this;
    }

    public function getCiviliteContact(): ?string
    {
        return $this->civiliteContact;
    }

    public function setCiviliteContact(string $civiliteContact): self
    {
        $this->civiliteContact = $civiliteContact;

        return $this;
    }

    public function getTelephoneContact(): ?string
    {
        return $this->telephoneContact;
    }

    public function setTelephoneContact(?string $telephoneContact): self
    {
        $this->telephoneContact = $telephoneContact;

        return $this;
    }

    public function getTelephonePortableContact(): ?string
    {
        return $this->telephonePortableContact;
    }

    public function setTelephonePortableContact(?string $telephonePortableContact): self
    {
        $this->telephonePortableContact = $telephonePortableContact;

        return $this;
    }

    public function getEmailContact(): ?string
    {
        return $this->emailContact;
    }

    public function setEmailContact(?string $emailContact): self
    {
        $this->emailContact = $emailContact;

        return $this;
    }

    public function getAdresseCompleteContact(): ?string
    {
        return $this->adresseCompleteContact;
    }

    public function setAdresseCompleteContact(?string $adresseCompleteContact): self
    {
        $this->adresseCompleteContact = $adresseCompleteContact;

        return $this;
    }

    public function getObservationContact(): ?string
    {
        return $this->observationContact;
    }

    public function setObservationContact(?string $observationContact): self
    {
        $this->observationContact = $observationContact;

        return $this;
    }

    public function getEnActiviteContact(): ?bool
    {
        return $this->enActiviteContact;
    }

    public function setEnActiviteContact(bool $enActiviteContact): self
    {
        $this->enActiviteContact = $enActiviteContact;

        return $this;
    }

    public function getCodeClientContact(): ?string
    {
        return $this->codeClientContact;
    }

    public function setCodeClientContact(?string $codeClientContact): self
    {
        $this->codeClientContact = $codeClientContact;

        return $this;
    }

    /**
     * @return Collection|Societe[]
     */
    public function getSociete(): Collection
    {
        return $this->societe;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societe->contains($societe)) {
            $this->societe[] = $societe;
            $societe->addContact($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societe->contains($societe)) {
            $this->societe->removeElement($societe);
            $societe->removeContact($this);
        }

        return $this;
    }

    /**
     * @return Collection|contactaffaire[]
     */
    public function getContactAffaire(): Collection
    {
        return $this->contactAffaire;
    }

    public function addContactAffaire(contactaffaire $contactAffaire): self
    {
        if (!$this->contactAffaire->contains($contactAffaire)) {
            $this->contactAffaire[] = $contactAffaire;
            $contactAffaire->setContact($this);
        }

        return $this;
    }

    public function removeContactAffaire(contactaffaire $contactAffaire): self
    {
        if ($this->contactAffaire->contains($contactAffaire)) {
            $this->contactAffaire->removeElement($contactAffaire);
            // set the owning side to null (unless already changed)
            if ($contactAffaire->getContact() === $this) {
                $contactAffaire->setContact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|systeme[]
     */
    public function getSysteme(): Collection
    {
        return $this->systeme;
    }

    public function addSysteme(systeme $systeme): self
    {
        if (!$this->systeme->contains($systeme)) {
            $this->systeme[] = $systeme;
            $systeme->setContact($this);
        }

        return $this;
    }

    public function removeSysteme(systeme $systeme): self
    {
        if ($this->systeme->contains($systeme)) {
            $this->systeme->removeElement($systeme);
            // set the owning side to null (unless already changed)
            if ($systeme->getContact() === $this) {
                $systeme->setContact(null);
            }
        }

        return $this;
    }

}
