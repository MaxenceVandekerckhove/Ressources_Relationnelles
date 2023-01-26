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
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $Type = null;

    #[ORM\OneToMany(mappedBy: 'Category', targetEntity: PublicationReferencerCategory::class, orphanRemoval: true)]
    private Collection $publicationReferencerCategories;

    public function __construct()
    {
        $this->publicationReferencerCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection<int, PublicationReferencerCategory>
     */
    public function getPublicationReferencerCategories(): Collection
    {
        return $this->publicationReferencerCategories;
    }

    public function addPublicationReferencerCategory(PublicationReferencerCategory $publicationReferencerCategory): self
    {
        if (!$this->publicationReferencerCategories->contains($publicationReferencerCategory)) {
            $this->publicationReferencerCategories->add($publicationReferencerCategory);
            $publicationReferencerCategory->setCategory($this);
        }

        return $this;
    }

    public function removePublicationReferencerCategory(PublicationReferencerCategory $publicationReferencerCategory): self
    {
        if ($this->publicationReferencerCategories->removeElement($publicationReferencerCategory)) {
            // set the owning side to null (unless already changed)
            if ($publicationReferencerCategory->getCategory() === $this) {
                $publicationReferencerCategory->setCategory(null);
            }
        }

        return $this;
    }
}