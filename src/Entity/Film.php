<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    public const GENRE_SCI_FI = 'Sci-Fi';
    public const GENRE_THRILLER = 'Thriller';
    public const GENRE_COMEDY = 'Comedy';
    public const GENRE_ACTION = 'Action';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $releaseYear = null;

    #[ORM\Column]
    private ?int $runtime = null;

    #[ORM\Column(length: 255)]
    private ?string $director = null;

    #[ORM\Column(length: 255)]
    private ?string $studio = null;

    #[ORM\ManyToMany(targetEntity: Genre::class, inversedBy: 'films')]
    #[ORM\JoinTable(name: 'film_genre')]
    private Collection $genres;

    #[ORM\Column(type: Types::ARRAY)]
    private array $actors = [];

    #[ORM\OneToMany(targetEntity: DVD::class, mappedBy: 'film')]
    private Collection $dvds;

    public function __construct(
        ?string $title = null,
        ?string $description = null,
        ?int $releaseYear = null,
        ?int $runtime = null,
        ?string $director = null,
        ?string $studio = null,
        array $actors = []
    ) {
        $this->dvds = new ArrayCollection();
        $this->genres = new ArrayCollection();
        $this->title = $title;
        $this->description = $description;
        $this->releaseYear = $releaseYear;
        $this->runtime = $runtime;
        $this->director = $director;
        $this->studio = $studio;
        $this->actors = $actors;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReleaseYear(): ?int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int $releaseYear): static
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function setRuntime(int $runtime): static
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(string $director): static
    {
        $this->director = $director;

        return $this;
    }

    public function getStudio(): ?string
    {
        return $this->studio;
    }

    public function setStudio(string $studio): static
    {
        $this->studio = $studio;

        return $this;
    }

    /**
     * @return Collection<int, Genre>
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): static
    {
        if (!$this->genres->contains($genre)) {
            $this->genres->add($genre);
            $genre->addFilm($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): static
    {
        if ($this->genres->removeElement($genre)) {
            $genre->removeFilm($this);
        }

        return $this;
    }

    public function getActors(): array
    {
        return $this->actors;
    }

    public function setActors(array $actors): static
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * @return Collection<int, DVD>
     */
    public function getDvds(): Collection
    {
        return $this->dvds;
    }

    public function addDvd(DVD $dvd): static
    {
        if (!$this->dvds->contains($dvd)) {
            $this->dvds->add($dvd);
            $dvd->setFilm($this);
        }

        return $this;
    }

    public function removeDvd(DVD $dvd): static
    {
        if ($this->dvds->removeElement($dvd)) {
            // set the owning side to null (unless already changed)
            if ($dvd->getFilm() === $this) {
                $dvd->setFilm(null);
            }
        }

        return $this;
    }
}
