<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $img = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $des = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'cat')]
    private ?Category $cat = null;

    #[ORM\ManyToOne(inversedBy: 'sup')]
    private ?Suplier $sup = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: OrderDetail::class)]
    private Collection $product;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Cart::class)]
    private Collection $pro;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Storage::class)]
    private Collection $prod;

    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->pro = new ArrayCollection();
        $this->prod = new ArrayCollection();
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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

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

    public function getDes(): ?string
    {
        return $this->des;
    }

    public function setDes(string $des): static
    {
        $this->des = $des;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getCat(): ?category
    {
        return $this->cat;
    }

    public function setCat(?category $cat): static
    {
        $this->cat = $cat;

        return $this;
    }

    public function getSup(): ?suplier
    {
        return $this->sup;
    }

    public function setSup(?suplier $sup): static
    {
        $this->sup = $sup;

        return $this;
    }

    /**
     * @return Collection<int, Orderdetail>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(OrderDetail $product): static
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setProduct($this);
        }

        return $this;
    }

    public function removeProduct(OrderDetail $product): static
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProduct() === $this) {
                $product->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cart>
     */
    public function getPro(): Collection
    {
        return $this->pro;
    }

    public function addPro(Cart $pro): static
    {
        if (!$this->pro->contains($pro)) {
            $this->pro->add($pro);
            $pro->setProduct($this);
        }

        return $this;
    }

    public function removePro(Cart $pro): static
    {
        if ($this->pro->removeElement($pro)) {
            // set the owning side to null (unless already changed)
            if ($pro->getProduct() === $this) {
                $pro->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Storage>
     */
    public function getProd(): Collection
    {
        return $this->prod;
    }

    public function addProd(Storage $prod): static
    {
        if (!$this->prod->contains($prod)) {
            $this->prod->add($prod);
            $prod->setProduct($this);
        }

        return $this;
    }

    public function removeProd(Storage $prod): static
    {
        if ($this->prod->removeElement($prod)) {
            // set the owning side to null (unless already changed)
            if ($prod->getProduct() === $this) {
                $prod->setProduct(null);
            }
        }

        return $this;
    }

}
