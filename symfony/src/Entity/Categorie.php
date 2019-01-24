<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subcat", mappedBy="categorie")
     */
    private $subcats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->subcats = new ArrayCollection();
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

    /**
     * @return Collection|Subcat[]
     */
    public function getSubcats(): Collection
    {
        return $this->subcats;
    }

    public function addSubcat(Subcat $subcat): self
    {
        if (!$this->subcats->contains($subcat)) {
            $this->subcats[] = $subcat;
            $subcat->setCategorie($this);
        }

        return $this;
    }

    public function removeSubcat(Subcat $subcat): self
    {
        if ($this->subcats->contains($subcat)) {
            $this->subcats->removeElement($subcat);
            // set the owning side to null (unless already changed)
            if ($subcat->getCategorie() === $this) {
                $subcat->setCategorie(null);
            }
        }

        return $this;
    }
}
