<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomRecette;

    /**
     * @ORM\Column(type="integer")
     */
    private $tempsPreparation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tempsCuisson;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionRecette;

    /**
     * @ORM\ManyToOne(targetEntity=ZoneGeo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $zoneGeo;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $image;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRecette(): ?string
    {
        return $this->nomRecette;
    }

    public function setNomRecette(string $nomRecette): self
    {
        $this->nomRecette = $nomRecette;

        return $this;
    }

    public function getTempsPreparation(): ?int
    {
        return $this->tempsPreparation;
    }

    public function setTempsPreparation(int $tempsPreparation): self
    {
        $this->tempsPreparation = $tempsPreparation;

        return $this;
    }

    public function getTempsCuisson(): ?int
    {
        return $this->tempsCuisson;
    }

    public function setTempsCuisson(?int $tempsCuisson): self
    {
        $this->tempsCuisson = $tempsCuisson;

        return $this;
    }

    public function getDescriptionRecette(): ?string
    {
        return $this->descriptionRecette;
    }

    public function setDescriptionRecette(?string $descriptionRecette): self
    {
        $this->descriptionRecette = $descriptionRecette;

        return $this;
    }

    public function getZoneGeo(): ?ZoneGeo
    {
        return $this->zoneGeo;
    }

    public function setZoneGeo(?ZoneGeo $zoneGeo): self
    {
        $this->zoneGeo = $zoneGeo;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    

    
}