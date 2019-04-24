<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacturationRepository")
 */
class Facturation
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
    private $numFacturation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFacturation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $prixFacturation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $tvaFacturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ordreFacturation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $horsTaxe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $monnaieFacturation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $modeReglement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateReglement;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Societe", mappedBy="facturation")
     */
    private $societe;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="facturation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function __construct()
    {
        $this->societe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumFacturation(): ?string
    {
        return $this->numFacturation;
    }

    public function setNumFacturation(string $numFacturation): self
    {
        $this->numFacturation = $numFacturation;

        return $this;
    }

    public function getDateFacturation(): ?\DateTimeInterface
    {
        return $this->dateFacturation;
    }

    public function setDateFacturation(\DateTimeInterface $dateFacturation): self
    {
        $this->dateFacturation = $dateFacturation;

        return $this;
    }

    public function getPrixFacturation()
    {
        return $this->prixFacturation;
    }

    public function setPrixFacturation($prixFacturation): self
    {
        $this->prixFacturation = $prixFacturation;

        return $this;
    }

    public function getTvaFacturation()
    {
        return $this->tvaFacturation;
    }

    public function setTvaFacturation($tvaFacturation): self
    {
        $this->tvaFacturation = $tvaFacturation;

        return $this;
    }

    public function getOrdreFacturation(): ?string
    {
        return $this->ordreFacturation;
    }

    public function setOrdreFacturation(?string $ordreFacturation): self
    {
        $this->ordreFacturation = $ordreFacturation;

        return $this;
    }

    public function getHorsTaxe()
    {
        return $this->horsTaxe;
    }

    public function setHorsTaxe($horsTaxe): self
    {
        $this->horsTaxe = $horsTaxe;

        return $this;
    }

    public function getMonnaieFacturation(): ?string
    {
        return $this->monnaieFacturation;
    }

    public function setMonnaieFacturation(?string $monnaieFacturation): self
    {
        $this->monnaieFacturation = $monnaieFacturation;

        return $this;
    }

    public function getModeReglement(): ?string
    {
        return $this->modeReglement;
    }

    public function setModeReglement(?string $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    public function getDateReglement(): ?\DateTimeInterface
    {
        return $this->dateReglement;
    }

    public function setDateReglement(?\DateTimeInterface $dateReglement): self
    {
        $this->dateReglement = $dateReglement;

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
            $societe->addFacturation($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societe->contains($societe)) {
            $this->societe->removeElement($societe);
            $societe->removeFacturation($this);
        }

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
