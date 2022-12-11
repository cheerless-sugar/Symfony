<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $surname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'actor', targetEntity: ActorPerformance::class)]
    private Collection $actorPerformances;

    public function __construct()
    {
        $this->actorPerformances = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, ActorPerformance>
     */
    public function getActorPerformances(): Collection
    {
        return $this->actorPerformances;
    }

    public function addActorPerformance(ActorPerformance $actorPerformance): self
    {
        if (!$this->actorPerformances->contains($actorPerformance)) {
            $this->actorPerformances->add($actorPerformance);
            $actorPerformance->setActor($this);
        }

        return $this;
    }

    public function removeActorPerformance(ActorPerformance $actorPerformance): self
    {
        if ($this->actorPerformances->removeElement($actorPerformance)) {
            // set the owning side to null (unless already changed)
            if ($actorPerformance->getActor() === $this) {
                $actorPerformance->setActor(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return "{$this->name} {$this->surname}";
    }
}
