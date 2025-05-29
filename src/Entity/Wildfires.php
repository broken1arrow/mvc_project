<?php

namespace App\Entity;

use App\Repository\WildfiresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WildfiresRepository::class)]
class Wildfires
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\ManyToOne(targetEntity:GlobalWhether::class,inversedBy:'wildfires')]
    #[ORM\JoinColumn(name:'globalwhether_id',referencedColumnName:'id',nullable:false)]
    private GlobalWhether $globalWhether;

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

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getGlobalWhether(): ?GlobalWhether
    {
        return $this->globalWhether;
    }

    public function setGlobalWhether(GlobalWhether $globalWhether): static
    {
        $this->globalWhether = $globalWhether;

        return $this;
    }


}
