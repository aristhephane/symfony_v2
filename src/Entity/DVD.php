<?php

namespace App\Entity;

use App\Repository\DVDRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DVDRepository::class)]
class DVD
{
    public const FORMAT_BLURAY = 'Blu-ray';
    public const FORMAT_DVD = 'DVD';
    public const FORMAT_4K = '4K';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'dvds')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    #[ORM\Column(length: 255)]
    private ?string $format = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(length: 255)]
    private ?string $poster = null;

    #[ORM\Column(type: 'integer')]
    private ?int $releaseYear = null;

    #[ORM\OneToMany(targetEntity: Review::class, mappedBy: 'dvdId')]
    private Collection $reviews;

    #[ORM\ManyToMany(targetEntity: Order::class, mappedBy: 'dvd')]
    private Collection $orders;

    /*#[ORM\ManyToOne(inversedBy: 'dvd')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Genre $genre = null;
    */

    public function __construct(
        ?Film $film = null,
        ?string $format = null,
        ?float $price = null,
        ?int $stock = null,
        ?string $poster = null,
        ?int $releaseYear = null
    ) {
        $this->film = $film;
        $this->format = $format;
        $this->price = $price;
        $this->stock = $stock;
        $this->poster = $poster;
        $this->releaseYear = $releaseYear;
        $this->reviews = new ArrayCollection();
        $this->orders = new ArrayCollection();
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

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): static
    {
        $this->film = $film;
        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): static
    {
        if (!in_array($format, [self::FORMAT_BLURAY, self::FORMAT_DVD, self::FORMAT_4K])) {
            throw new \InvalidArgumentException("Invalid format");
        }
        $this->format = $format;
        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;
        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;
        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): static
    {
        $this->poster = $poster;
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

    /**
     * @return Collection<int, Review>
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): static
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
            $review->setDvdId($this);
        }
        return $this;
    }

    public function removeReview(Review $review): static
    {
        if ($this->reviews->removeElement($review)) {
            if ($review->getDvdId() === $this) {
                $review->setDvdId(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): static
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->addDvd($this);
        }
        return $this;
    }

    public function removeOrder(Order $order): static
    {
        if ($this->orders->removeElement($order)) {
            $order->removeDvd($this);
        }
        return $this;
    }

    /*
    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): static
    {
        $this->genre = $genre;
        return $this;
    }
*/
    public function __toString(): string
    {
        return $this->getFilm()->getTitle() . ' (' . $this->getFormat() . ')';
    }
}
