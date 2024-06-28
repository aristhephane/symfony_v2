<?php
// A mettre a jour dans le cahier de charge et modele objet
namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column(type: 'integer')]
  private $id;

  #[ORM\Column(type: 'string', length: 255)]
  private $name;

  #[ORM\Column(type: 'float')]
  private $discount;

  #[ORM\Column(type: 'datetime')]
  private $startDate;

  #[ORM\Column(type: 'datetime')]
  private $endDate;

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

  public function getDiscount(): ?float
  {
    return $this->discount;
  }

  public function setDiscount(float $discount): self
  {
    $this->discount = $discount;

    return $this;
  }

  public function getStartDate(): ?\DateTimeInterface
  {
    return $this->startDate;
  }

  public function setStartDate(\DateTimeInterface $startDate): self
  {
    $this->startDate = $startDate;

    return $this;
  }

  public function getEndDate(): ?\DateTimeInterface
  {
    return $this->endDate;
  }

  public function setEndDate(\DateTimeInterface $endDate): self
  {
    $this->endDate = $endDate;

    return $this;
  }
}
