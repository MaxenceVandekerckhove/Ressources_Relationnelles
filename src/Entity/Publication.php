<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
#[ApiResource]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $state_validated = null;

    #[ORM\Column]
    private ?bool $state_private = null;

    #[ORM\Column]
    private ?int $like_number = null;

    #[ORM\Column]
    private ?int $sharing_number = null;

    #[ORM\Column]
    private ?int $view_number = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Theme $theme = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function isStateValidated(): ?bool
    {
        return $this->state_validated;
    }

    public function setStateValidated(bool $state_validated): self
    {
        $this->state_validated = $state_validated;

        return $this;
    }

    public function isStatePrivate(): ?bool
    {
        return $this->state_private;
    }

    public function setStatePrivate(bool $state_private): self
    {
        $this->state_private = $state_private;

        return $this;
    }

    public function getLikeNumber(): ?int
    {
        return $this->like_number;
    }

    public function setLikeNumber(int $like_number): self
    {
        $this->like_number = $like_number;

        return $this;
    }

    public function getSharingNumber(): ?int
    {
        return $this->sharing_number;
    }

    public function setSharingNumber(int $sharing_number): self
    {
        $this->sharing_number = $sharing_number;

        return $this;
    }

    public function getViewNumber(): ?int
    {
        return $this->view_number;
    }

    public function setViewNumber(int $view_number): self
    {
        $this->view_number = $view_number;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
