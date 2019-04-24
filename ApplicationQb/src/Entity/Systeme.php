<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SystemeRepository")
 */
class Systeme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numeroSerie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $agrementCpq;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $possedeRepris;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact", inversedBy="systeme")
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupeSysteme", inversedBy="systeme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupesysteme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Articlesysteme", mappedBy="systeme", orphanRemoval=true)
     */
    private $articlesysteme;

    public function __construct()
    {
        $this->articlesysteme = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroSerie(): ?string
    {
        return $this->numeroSerie;
    }

    public function setNumeroSerie(?string $numeroSerie): self
    {
        $this->numeroSerie = $numeroSerie;

        return $this;
    }

    public function getAgrementCpq(): ?string
    {
        return $this->agrementCpq;
    }

    public function setAgrementCpq(?string $agrementCpq): self
    {
        $this->agrementCpq = $agrementCpq;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getPossedeRepris(): ?string
    {
        return $this->possedeRepris;
    }

    public function setPossedeRepris(string $possedeRepris): self
    {
        $this->possedeRepris = $possedeRepris;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getGroupesysteme(): ?Groupesysteme
    {
        return $this->groupesysteme;
    }

    public function setGroupesysteme(?Groupesysteme $groupesysteme): self
    {
        $this->groupesysteme = $groupesysteme;

        return $this;
    }

    /**
     * @return Collection|articlesysteme[]
     */
    public function getArticlesysteme(): Collection
    {
        return $this->articlesysteme;
    }

    public function addArticlesysteme(articlesysteme $articlesysteme): self
    {
        if (!$this->articlesysteme->contains($articlesysteme)) {
            $this->articlesysteme[] = $articlesysteme;
            $articlesysteme->setSysteme($this);
        }

        return $this;
    }

    public function removeArticlesysteme(articlesysteme $articlesysteme): self
    {
        if ($this->articlesysteme->contains($articlesysteme)) {
            $this->articlesysteme->removeElement($articlesysteme);
            // set the owning side to null (unless already changed)
            if ($articlesysteme->getSysteme() === $this) {
                $articlesysteme->setSysteme(null);
            }
        }

        return $this;
    }
}
