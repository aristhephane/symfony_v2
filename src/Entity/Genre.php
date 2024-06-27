<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, DVD>
     */
    #[ORM\OneToMany(targetEntity: DVD::class, mappedBy: 'genre')]
    private Collection $dvd;

    public function __construct()
    {
        $this->dvd = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, DVD>
     */
    public function getDvd(): Collection
    {
        return $this->dvd;
    }

    public function addDvd(DVD $dvd): static
    {
        if (!$this->dvd->contains($dvd)) {
            $this->dvd->add($dvd);
            $dvd->setGenre($this);
        }

        return $this;
    }

    public function removeDvd(DVD $dvd): static
    {
        if ($this->dvd->removeElement($dvd)) {
            // set the owning side to null (unless already changed)
            if ($dvd->getGenre() === $this) {
                $dvd->setGenre(null);
            }
        }

        return $this;
    }
}
