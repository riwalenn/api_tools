<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FavoriteToolsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ApiResource(
    itemOperations: ['get', 'put', 'delete', 'patch']
)]
#[ORM\Entity(repositoryClass: FavoriteToolsRepository::class)]
class FavoriteTools
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[NotBlank]
    private Users $Users;

    #[ORM\ManyToOne(targetEntity: Categories::class)]
    #[NotBlank]
    private Categories $Category;

    #[ORM\Column(name: 'is_broken', type: 'boolean', nullable: false)]
    #[NotBlank]
    private bool $isBroken;

    #[ORM\Column(name: 'is_liked', type: 'boolean', nullable: false)]
    #[NotBlank]
    #[NotBlank]
    private bool $isLiked;

    #[ORM\Column(name: 'is_unliked', type: 'boolean', nullable: false)]
    #[NotBlank]
    private bool $isUnliked;

    #[ORM\Column(name: 'is_favorite', type: 'boolean', nullable: false)]
    #[NotBlank]
    private bool $isFavorite;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    #[NotBlank]
    private bool $isActive;

    #[ORM\Column(name: 'tags', type: 'string', length: 255, nullable: true)]
    private ?string $tags;

    #[ORM\Column(name: 'note', type: 'string', length: 255, nullable: true)]
    private ?string $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsBroken(): ?bool
    {
        return $this->isBroken;
    }

    public function setIsBroken(bool $isBroken): self
    {
        $this->isBroken = $isBroken;

        return $this;
    }

    public function getIsLiked(): ?bool
    {
        return $this->isLiked;
    }

    public function setIsLiked(bool $isLiked): self
    {
        $this->isLiked = $isLiked;

        return $this;
    }

    public function getIsUnliked(): ?bool
    {
        return $this->isUnliked;
    }

    public function setIsUnliked(bool $isUnliked): self
    {
        $this->isUnliked = $isUnliked;

        return $this;
    }

    public function getIsFavorite(): ?bool
    {
        return $this->isFavorite;
    }

    public function setIsFavorite(bool $isFavorite): self
    {
        $this->isFavorite = $isFavorite;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->Category;
    }

    public function setCategory(?Categories $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->Users;
    }

    public function setUsers(?Users $Users): self
    {
        $this->Users = $Users;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(?string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }
}
