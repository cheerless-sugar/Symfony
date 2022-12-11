<?php

namespace App\Entity;

use App\Repository\PerformanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerformanceRepository::class)]
class Performance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $budget = null;

    #[ORM\OneToMany(mappedBy: 'performance', targetEntity: PerformanceRole::class)]
    private Collection $performanceRoles;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function __construct()
    {
        $this->performanceRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(float $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * @return Collection<int, PerformanceRole>
     */
    public function getPerformanceRoles(): Collection
    {
        return $this->performanceRoles;
    }

    public function addPerformanceRole(PerformanceRole $performanceRole): self
    {
        if (!$this->performanceRoles->contains($performanceRole)) {
            $this->performanceRoles->add($performanceRole);
            $performanceRole->setPerformance($this);
        }

        return $this;
    }

    public function removePerformanceRole(PerformanceRole $performanceRole): self
    {
        if ($this->performanceRoles->removeElement($performanceRole)) {
            // set the owning side to null (unless already changed)
            if ($performanceRole->getPerformance() === $this) {
                $performanceRole->setPerformance(null);
            }
        }

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
