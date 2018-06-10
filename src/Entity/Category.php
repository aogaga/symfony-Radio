<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category extends AbstractEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stations", mappedBy="category", orphanRemoval=true)
     */
    private $stations;

    public function __construct()
    {
        $this->stations = new ArrayCollection();
    }

    public function getId()
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Stations[]
     */
    public function getStations(): Collection
    {
        return $this->stations;
    }

    public function addStation(Stations $station): self
    {
        if (!$this->stations->contains($station)) {
            $this->stations[] = $station;
            $station->setCategory($this);
        }

        return $this;
    }

    public function removeStation(Stations $station): self
    {
        if ($this->stations->contains($station)) {
            $this->stations->removeElement($station);
            // set the owning side to null (unless already changed)
            if ($station->getCategory() === $this) {
                $station->setCategory(null);
            }
        }

        return $this;
    }
}
