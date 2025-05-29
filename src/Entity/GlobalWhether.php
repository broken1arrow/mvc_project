<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use App\Repository\GlobalWhetherRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: GlobalWhetherRepository::class)]
class GlobalWhether
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $temperature = null;

    #[ORM\OneToMany(mappedBy: 'globalWhether', targetEntity: Wildfires::class, cascade: ["persist"])]
    private  $wildfires;

    #[ORM\OneToMany(mappedBy: 'globalWhether', targetEntity: Emissions::class, cascade: ["persist"])]
    private  $emissions;

    public function  __construct()
    {
        $this->wildfires = new ArrayCollection();
        $this->emissions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): static
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getWildfires()
    {
        return $this->wildfires;
    }

    public function addWildfires(Wildfires  $wildfires): static
    {
        $this->wildfires[] = $wildfires;
        $wildfires->setGlobalWhether($this);
        return $this;
    }

    public function getEmissions()
    {
        return $this->emissions;
    }

    public function addEmissions(Emissions  $emissions): static
    {
        $this->emissions[] = $emissions;
        $emissions->setGlobalWhether($this);
        return $this;
    }
}
