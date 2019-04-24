<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TarifRepository")
 */
class Tarif
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
    private $puhtSystemeVente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $puhtSystemeLocation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $puhtTelecoVente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $puhtTelecoLocation;

    /**
     * @ORM\Column(type="date")
     */
    private $dateTarif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPuhtSystemeVente(): ?string
    {
        return $this->puhtSystemeVente;
    }

    public function setPuhtSystemeVente(?string $puhtSystemeVente): self
    {
        $this->puhtSystemeVente = $puhtSystemeVente;

        return $this;
    }

    public function getPuhtSystemeLocation(): ?string
    {
        return $this->puhtSystemeLocation;
    }

    public function setPuhtSystemeLocation(?string $puhtSystemeLocation): self
    {
        $this->puhtSystemeLocation = $puhtSystemeLocation;

        return $this;
    }

    public function getPuhtTelecoVente(): ?string
    {
        return $this->puhtTelecoVente;
    }

    public function setPuhtTelecoVente(?string $puhtTelecoVente): self
    {
        $this->puhtTelecoVente = $puhtTelecoVente;

        return $this;
    }

    public function getPuhtTelecoLocation(): ?string
    {
        return $this->puhtTelecoLocation;
    }

    public function setPuhtTelecoLocation(?string $puhtTelecoLocation): self
    {
        $this->puhtTelecoLocation = $puhtTelecoLocation;

        return $this;
    }

    public function getDateTarif(): ?\DateTimeInterface
    {
        return $this->dateTarif;
    }

    public function setDateTarif(\DateTimeInterface $dateTarif): self
    {
        $this->dateTarif = $dateTarif;

        return $this;
    }
}
