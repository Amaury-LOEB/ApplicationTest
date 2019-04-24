<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesystemeRepository")
 */
class Articlesysteme
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbTeleco;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Systeme", inversedBy="articlesysteme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $systeme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="articlesysteme")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTeleco(): ?int
    {
        return $this->nbTeleco;
    }

    public function setNbTeleco(int $nbTeleco): self
    {
        $this->nbTeleco = $nbTeleco;

        return $this;
    }

    public function getSysteme(): ?Systeme
    {
        return $this->systeme;
    }

    public function setSysteme(?Systeme $systeme): self
    {
        $this->systeme = $systeme;

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
