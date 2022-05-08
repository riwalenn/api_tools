<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\ToolsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['collection', 'item']]
        ],
        'post'
    ],
    itemOperations: ['get', 'put', 'patch'],
    attributes: ["pagination_enabled" => false]
)]
#[ApiFilter(SearchFilter::class, properties: [
    'nom' => SearchFilter::STRATEGY_PARTIAL,
    'link' => SearchFilter::STRATEGY_PARTIAL,
])]
#[ApiFilter(OrderFilter::class, properties: ['nom'], arguments: ['orderParameterName' => 'order'])]
#[ORM\Entity(repositoryClass: ToolsRepository::class)]
class Tools
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['collection'])]
    private $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    #[Groups(['collection'])]
    private string $nom;

    #[ORM\Column(name: 'description', type: 'string', length: 255, nullable: true)]
    #[Groups(['collection'])]
    private string $description;

    #[ORM\Column(name: 'link', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    #[Groups(['collection'])]
    private string $link;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable', nullable: false)]
    #[NotBlank]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    #[NotBlank]
    private bool $isActive;

    #[ORM\ManyToOne(targetEntity: Categories::class)]
    #[NotBlank]
    #[Groups(['collection'])]
    private Categories $Category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

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
}
