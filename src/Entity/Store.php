<?php

namespace App\Entity;

use App\Repository\StoreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StoreRepository::class)]
class Store
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\OneToMany(mappedBy: 'Store', targetEntity: Order::class)]
    private Collection $store;

    #[ORM\OneToMany(mappedBy: 'Store', targetEntity: Storage::class)]
    private Collection $sto;

    #[ORM\OneToMany(mappedBy: 'Store', targetEntity: Staff::class)]
    private Collection $st;

    public function __construct()
    {
        $this->store = new ArrayCollection();
        $this->sto = new ArrayCollection();
        $this->st = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

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
     * @return Collection<int, Order>
     */
    public function getStore(): Collection
    {
        return $this->store;
    }

    public function addStore(Order $store): static
    {
        if (!$this->store->contains($store)) {
            $this->store->add($store);
            $store->setStore($this);
        }

        return $this;
    }

    public function removeStore(Order $store): static
    {
        if ($this->store->removeElement($store)) {
            // set the owning side to null (unless already changed)
            if ($store->getStore() === $this) {
                $store->setStore(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Storage>
     */
    public function getSto(): Collection
    {
        return $this->sto;
    }

    public function addSto(Storage $sto): static
    {
        if (!$this->sto->contains($sto)) {
            $this->sto->add($sto);
            $sto->setStore($this);
        }

        return $this;
    }

    public function removeSto(Storage $sto): static
    {
        if ($this->sto->removeElement($sto)) {
            // set the owning side to null (unless already changed)
            if ($sto->getStore() === $this) {
                $sto->setStore(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Staff>
     */
    public function getSt(): Collection
    {
        return $this->st;
    }

    public function addSt(Staff $st): static
    {
        if (!$this->st->contains($st)) {
            $this->st->add($st);
            $st->setStore($this);
        }

        return $this;
    }

    public function removeSt(Staff $st): static
    {
        if ($this->st->removeElement($st)) {
            // set the owning side to null (unless already changed)
            if ($st->getStore() === $this) {
                $st->setStore(null);
            }
        }

        return $this;
    }
}
