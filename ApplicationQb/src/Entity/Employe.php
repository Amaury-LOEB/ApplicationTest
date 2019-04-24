<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeRepository")
 */
class Employe
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
    private $nomEmploye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomEmploye;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fonctionEmploye;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephoneEmploye;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emailEmploye;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Affaire", mappedBy="employe")
     */
    private $affaire;

    public function __construct()
    {
        $this->affaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmploye(): ?string
    {
        return $this->nomEmploye;
    }

    public function setNomEmploye(string $nomEmploye): self
    {
        $this->nomEmploye = $nomEmploye;

        return $this;
    }

    public function getPrenomEmploye(): ?string
    {
        return $this->prenomEmploye;
    }

    public function setPrenomEmploye(string $prenomEmploye): self
    {
        $this->prenomEmploye = $prenomEmploye;

        return $this;
    }

    public function getFonctionEmploye(): ?string
    {
        return $this->fonctionEmploye;
    }

    public function setFonctionEmploye(?string $fonctionEmploye): self
    {
        $this->fonctionEmploye = $fonctionEmploye;

        return $this;
    }

    public function getTelephoneEmploye(): ?string
    {
        return $this->telephoneEmploye;
    }

    public function setTelephoneEmploye(?string $telephoneEmploye): self
    {
        $this->telephoneEmploye = $telephoneEmploye;

        return $this;
    }

    public function getEmailEmploye(): ?string
    {
        return $this->emailEmploye;
    }

    public function setEmailEmploye(?string $emailEmploye): self
    {
        $this->emailEmploye = $emailEmploye;

        return $this;
    }

    /**
     * @return Collection|Affaire[]
     */
    public function getAffaire(): Collection
    {
        return $this->affaire;
    }

    public function addAffaire(Affaire $affaire): self
    {
        if (!$this->affaire->contains($affaire)) {
            $this->affaire[] = $affaire;
            $affaire->addEmploye($this);
        }

        return $this;
    }

    public function removeAffaire(Affaire $affaire): self
    {
        if ($this->affaire->contains($affaire)) {
            $this->affaire->removeElement($affaire);
            $affaire->removeEmploye($this);
        }

        return $this;
    }
}
