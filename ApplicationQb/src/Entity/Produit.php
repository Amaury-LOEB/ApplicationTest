<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 */
class Produit
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
    private $nomProduit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeProduit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="produit", orphanRemoval=true)
     */
    private $article;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Tarif", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tarif;

    public function __construct()
    {
        $this->article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getTypeProduit(): ?string
    {
        return $this->typeProduit;
    }

    public function setTypeProduit(string $typeProduit): self
    {
        $this->typeProduit = $typeProduit;

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
            $article->setProduit($this);
        }

        return $this;
    }

    public function removeArticle(article $article): self
    {
        if ($this->article->contains($article)) {
            $this->article->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getProduit() === $this) {
                $article->setProduit(null);
            }
        }

        return $this;
    }

    public function getTarif(): ?tarif
    {
        return $this->tarif;
    }

    public function setTarif(tarif $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }
}
