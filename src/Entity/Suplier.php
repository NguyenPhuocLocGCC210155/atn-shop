<?php

namespace App\Entity;

use App\Repository\SuplierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuplierRepository::class)]
class Suplier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 10)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\OneToMany(mappedBy: 'sup', targetEntity: Product::class)]
    private Collection $sup;

    public function __construct()
    {
        $this->sup = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getSup(): Collection
    {
        return $this->sup;
    }

    public function addSup(Product $sup): static
    {
        if (!$this->sup->contains($sup)) {
            $this->sup->add($sup);
            $sup->setSup($this);
        }

        return $this;
    }

    public function removeSup(Product $sup): static
    {
        if ($this->sup->removeElement($sup)) {
            // set the owning side to null (unless already changed)
            if ($sup->getSup() === $this) {
                $sup->setSup(null);
            }
        }

        return $this;
    }

}
