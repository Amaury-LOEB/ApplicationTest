<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixTotalHt;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $remise=0;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $retenu;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite=0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande", inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Articlesysteme", mappedBy="article", orphanRemoval=true)
     */
    private $articlesysteme;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Facturation", mappedBy="article", orphanRemoval=true)
     */
    private $facturation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produit", inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function __construct()
    {
        $this->articlesysteme = new ArrayCollection();
        $this->facturation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixTotalHt()
    {
        return $this->prixTotalHt;
    }

    public function setPrixTotalHt($prixTotalHt): self
    {
        $this->prixTotalHt = $prixTotalHt;

        return $this;
    }

    public function getRemise()
    {
        return $this->remise;
    }

    public function setRemise($remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getRetenu(): ?string
    {
        return $this->retenu;
    }

    public function setRetenu(string $retenu): self
    {
        $this->retenu = $retenu;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

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
            $articlesysteme->setArticle($this);
        }

        return $this;
    }

    public function removeArticlesysteme(articlesysteme $articlesysteme): self
    {
        if ($this->articlesysteme->contains($articlesysteme)) {
            $this->articlesysteme->removeElement($articlesysteme);
            // set the owning side to null (unless already changed)
            if ($articlesysteme->getArticle() === $this) {
                $articlesysteme->setArticle(null);
            }
        }

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
            $facturation->setArticle($this);
        }

        return $this;
    }

    public function removeFacturation(facturation $facturation): self
    {
        if ($this->facturation->contains($facturation)) {
            $this->facturation->removeElement($facturation);
            // set the owning side to null (unless already changed)
            if ($facturation->getArticle() === $this) {
                $facturation->setArticle(null);
            }
        }

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
