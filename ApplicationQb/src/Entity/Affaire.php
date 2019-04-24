<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AffaireRepository")
 */
class Affaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAffaire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $debutAssistance;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $finAssistance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statutAffaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichierProposition;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $rappelAffaire;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaireAffaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeFacture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contactaffaire", mappedBy="affaire", orphanRemoval=true)
     */
    private $contactaffaire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Societe", mappedBy="affaire")
     */
    private $societe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Groupe", inversedBy="affaire")
     */
    private $groupe;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Employe", inversedBy="affaire")
     */
    private $employe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="affaire", orphanRemoval=true)
     */
    private $commande;

    public function __construct()
    {
        $this->contactaffaire = new ArrayCollection();
        $this->societe = new ArrayCollection();
        $this->employe = new ArrayCollection();
        $this->commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAffaire(): ?\DateTimeInterface
    {
        return $this->dateAffaire;
    }

    public function setDateAffaire(\DateTimeInterface $dateAffaire): self
    {
        $this->dateAffaire = $dateAffaire;

        return $this;
    }

    public function getDebutAssistance(): ?\DateTimeInterface
    {
        return $this->debutAssistance;
    }

    public function setDebutAssistance(?\DateTimeInterface $debutAssistance): self
    {
        $this->debutAssistance = $debutAssistance;

        return $this;
    }

    public function getFinAssistance(): ?\DateTimeInterface
    {
        return $this->finAssistance;
    }

    public function setFinAssistance(?\DateTimeInterface $finAssistance): self
    {
        $this->finAssistance = $finAssistance;

        return $this;
    }

    public function getStatutAffaire(): ?string
    {
        return $this->statutAffaire;
    }

    public function setStatutAffaire(?string $statutAffaire): self
    {
        $this->statutAffaire = $statutAffaire;

        return $this;
    }

    public function getFichierProposition(): ?string
    {
        return $this->fichierProposition;
    }

    public function setFichierProposition(?string $fichierProposition): self
    {
        $this->fichierProposition = $fichierProposition;

        return $this;
    }

    public function getRappelAffaire(): ?\DateTimeInterface
    {
        return $this->rappelAffaire;
    }

    public function setRappelAffaire(?\DateTimeInterface $rappelAffaire): self
    {
        $this->rappelAffaire = $rappelAffaire;

        return $this;
    }

    public function getCommentaireAffaire(): ?string
    {
        return $this->commentaireAffaire;
    }

    public function setCommentaireAffaire(?string $commentaireAffaire): self
    {
        $this->commentaireAffaire = $commentaireAffaire;

        return $this;
    }

    public function getTypeFacture(): ?string
    {
        return $this->typeFacture;
    }

    public function setTypeFacture(?string $typeFacture): self
    {
        $this->typeFacture = $typeFacture;

        return $this;
    }

    /**
     * @return Collection|contactaffaire[]
     */
    public function getContactaffaire(): Collection
    {
        return $this->contactaffaire;
    }

    public function addContactaffaire(contactaffaire $contactaffaire): self
    {
        if (!$this->contactaffaire->contains($contactaffaire)) {
            $this->contactaffaire[] = $contactaffaire;
            $contactaffaire->setAffaire($this);
        }

        return $this;
    }

    public function removeContactaffaire(contactaffaire $contactaffaire): self
    {
        if ($this->contactaffaire->contains($contactaffaire)) {
            $this->contactaffaire->removeElement($contactaffaire);
            // set the owning side to null (unless already changed)
            if ($contactaffaire->getAffaire() === $this) {
                $contactaffaire->setAffaire(null);
            }
        }

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
            $societe->addAffaire($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societe->contains($societe)) {
            $this->societe->removeElement($societe);
            $societe->removeAffaire($this);
        }

        return $this;
    }

    public function getGroupe(): ?Groupe
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupe $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * @return Collection|employe[]
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(employe $employe): self
    {
        if (!$this->employe->contains($employe)) {
            $this->employe[] = $employe;
        }

        return $this;
    }

    public function removeEmploye(employe $employe): self
    {
        if ($this->employe->contains($employe)) {
            $this->employe->removeElement($employe);
        }

        return $this;
    }

    /**
     * @return Collection|commande[]
     */
    public function getCommande(): Collection
    {
        return $this->commande;
    }

    public function addCommande(commande $commande): self
    {
        if (!$this->commande->contains($commande)) {
            $this->commande[] = $commande;
            $commande->setAffaire($this);
        }

        return $this;
    }

    public function removeCommande(commande $commande): self
    {
        if ($this->commande->contains($commande)) {
            $this->commande->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getAffaire() === $this) {
                $commande->setAffaire(null);
            }
        }

        return $this;
    }
}
