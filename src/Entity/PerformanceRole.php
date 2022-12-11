<?php

namespace App\Entity;

use App\Repository\PerformanceRoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerformanceRoleRepository::class)]
class PerformanceRole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'performanceRoles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Performance $performance = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Role $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerformance(): ?Performance
    {
        return $this->performance;
    }

    public function setPerformance(?Performance $performance): self
    {
        $this->performance = $performance;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public  function __toString()
    {
        return $this->role->getName();
    }
}
