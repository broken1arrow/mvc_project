<?php

namespace App\Entity;

use App\Repository\EmissionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmissionsRepository::class)]
class Emissions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amount_em = null;

    #[ORM\ManyToOne(targetEntity: GlobalWhether::class, inversedBy: 'emissions')]
    #[ORM\JoinColumn(name: 'globalwhether_id', referencedColumnName: 'id', nullable: false)]
    private GlobalWhether $globalWhether;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmountEm(): ?float
    {
        return $this->amount_em;
    }

    public function setAmountEm(float $amount_em): static
    {
        $this->amount_em = $amount_em;

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
