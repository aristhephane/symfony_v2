<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $orderDate = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Customer $customerId = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $items = [];

    #[ORM\Column]
    private ?float $totalPrice = null;

    /**
     * @var Collection<int, DVD>
     */
    #[ORM\ManyToMany(targetEntity: DVD::class, inversedBy: 'orders')]
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

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeInterface $orderDate): static
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCustomerId(): ?Customer
    {
        return $this->customerId;
    }

    public function setCustomerId(?Customer $customerId): static
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): static
    {
        $this->totalPrice = $totalPrice;

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
        }

        return $this;
    }

    public function removeDvd(DVD $dvd): static
    {
        $this->dvd->removeElement($dvd);

        return $this;
    }
}
