<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeSystemeRepository")
 */
class GroupeSysteme
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
    private $nomGroupeSysteme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $familleGroupeSysteme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Systeme", mappedBy="groupesysteme", orphanRemoval=true)
     */
    private $systeme;

    public function __construct()
    {
        $this->systeme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomGroupeSysteme(): ?string
    {
        return $this->nomGroupeSysteme;
    }

    public function setNomGroupeSysteme(string $nomGroupeSysteme): self
    {
        $this->nomGroupeSysteme = $nomGroupeSysteme;

        return $this;
    }

    public function getFamilleGroupeSysteme(): ?string
    {
        return $this->familleGroupeSysteme;
    }

    public function setFamilleGroupeSysteme(?string $familleGroupeSysteme): self
    {
        $this->familleGroupeSysteme = $familleGroupeSysteme;

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
            $systeme->setGroupesysteme($this);
        }

        return $this;
    }

    public function removeSysteme(systeme $systeme): self
    {
        if ($this->systeme->contains($systeme)) {
            $this->systeme->removeElement($systeme);
            // set the owning side to null (unless already changed)
            if ($systeme->getGroupesysteme() === $this) {
                $systeme->setGroupesysteme(null);
            }
        }

        return $this;
    }
}
