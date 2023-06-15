<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'cat', targetEntity: Product::class)]
    private Collection $cat;

    public function __construct()
    {
        $this->cat = new ArrayCollection();
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

    /**
     * @return Collection<int, Product>
     */
    public function getCat(): Collection
    {
        return $this->cat;
    }

    public function addCat(Product $cat): static
    {
        if (!$this->cat->contains($cat)) {
            $this->cat->add($cat);
            $cat->setCat($this);
        }

        return $this;
    }

    public function removeCat(Product $cat): static
    {
        if ($this->cat->removeElement($cat)) {
            // set the owning side to null (unless already changed)
            if ($cat->getCat() === $this) {
                $cat->setCat(null);
            }
        }

        return $this;
    }

}
