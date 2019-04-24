<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
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
    private $locationVente;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $remiseGlobale;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $prixCommande;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statutCommande;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $compteRendu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Affaire", inversedBy="commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $affaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Devis", mappedBy="commande", orphanRemoval=true)
     */
    private $devis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="commande", orphanRemoval=true)
     */
    private $article;

    public function __construct()
    {
        $this->devis = new ArrayCollection();
        $this->article = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocationVente(): ?string
    {
        return $this->locationVente;
    }

    public function setLocationVente(?string $locationVente): self
    {
        $this->locationVente = $locationVente;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(?\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getRemiseGlobale()
    {
        return $this->remiseGlobale;
    }

    public function setRemiseGlobale($remiseGlobale): self
    {
        $this->remiseGlobale = $remiseGlobale;

        return $this;
    }

    public function getPrixCommande()
    {
        return $this->prixCommande;
    }

    public function setPrixCommande($prixCommande): self
    {
        $this->prixCommande = $prixCommande;

        return $this;
    }

    public function getStatutCommande(): ?string
    {
        return $this->statutCommande;
    }

    public function setStatutCommande(?string $statutCommande): self
    {
        $this->statutCommande = $statutCommande;

        return $this;
    }

    public function getCompteRendu(): ?string
    {
        return $this->compteRendu;
    }

    public function setCompteRendu(?string $compteRendu): self
    {
        $this->compteRendu = $compteRendu;

        return $this;
    }

    public function getAffaire(): ?Affaire
    {
        return $this->affaire;
    }

    public function setAffaire(?Affaire $affaire): self
    {
        $this->affaire = $affaire;

        return $this;
    }

    /**
     * @return Collection|devis[]
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevis(devis $devis): self
    {
        if (!$this->devis->contains($devis)) {
            $this->devis[] = $devis;
            $devis->setCommande($this);
        }

        return $this;
    }

    public function removeDevis(devis $devis): self
    {
        if ($this->devis->contains($devis)) {
            $this->devis->removeElement($devis);
            // set the owning side to null (unless already changed)
            if ($devis->getCommande() === $this) {
                $devis->setCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setCommande($this);
        }

        return $this;
    }

    public function removeArticle(article $article): self
    {
        if ($this->article->contains($article)) {
            $this->article->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getCommande() === $this) {
                $article->setCommande(null);
            }
        }

        return $this;
    }
}
