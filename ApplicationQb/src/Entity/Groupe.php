<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 */
class Groupe
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
    private $nomGroupe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Societe", mappedBy="groupe")
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Affaire", mappedBy="groupe")
     */
    private $affaire;

    public function __construct()
    {
        $this->societe = new ArrayCollection();
        $this->affaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGroupe(): ?string
    {
        return $this->nomGroupe;
    }

    public function setNomGroupe(string $nomGroupe): self
    {
        $this->nomGroupe = $nomGroupe;

        return $this;
    }

    /**
     * @return Collection|societe[]
     */
    public function getSociete(): Collection
    {
        return $this->societe;
    }

    public function addSociete(societe $societe): self
    {
        if (!$this->societe->contains($societe)) {
            $this->societe[] = $societe;
            $societe->setGroupe($this);
        }

        return $this;
    }

    public function removeSociete(societe $societe): self
    {
        if ($this->societe->contains($societe)) {
            $this->societe->removeElement($societe);
            // set the owning side to null (unless already changed)
            if ($societe->getGroupe() === $this) {
                $societe->setGroupe(null);
            }
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
            $affaire->setGroupe($this);
        }

        return $this;
    }

    public function removeAffaire(affaire $affaire): self
    {
        if ($this->affaire->contains($affaire)) {
            $this->affaire->removeElement($affaire);
            // set the owning side to null (unless already changed)
            if ($affaire->getGroupe() === $this) {
                $affaire->setGroupe(null);
            }
        }

        return $this;
    }
}
