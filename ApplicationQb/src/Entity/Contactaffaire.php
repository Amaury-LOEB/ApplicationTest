<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactaffaireRepository")
 */
class Contactaffaire
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
    private $roleDansAffaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contact", inversedBy="contactAffaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Affaire", inversedBy="contactaffaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $affaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleDansAffaire(): ?string
    {
        return $this->roleDansAffaire;
    }

    public function setRoleDansAffaire(?string $roleDansAffaire): self
    {
        $this->roleDansAffaire = $roleDansAffaire;

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

    public function getAffaire(): ?Affaire
    {
        return $this->affaire;
    }

    public function setAffaire(?Affaire $affaire): self
    {
        $this->affaire = $affaire;

        return $this;
    }
}
