<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ApiResource(
    collectionOperations: ['get', 'post'],
    itemOperations: ['get', 'put', 'patch'],
    attributes: ["pagination_enabled" => false]
)]
#[ApiFilter(SearchFilter::class, properties: [
    'nom' => SearchFilter::STRATEGY_PARTIAL
])]
#[ApiFilter(OrderFilter::class, properties: ['id'], arguments: ['orderParameterName' => 'order'])]
#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['item'])]
    private $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    #[Groups(['item'])]
    private ?string $nom;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    #[NotBlank]
    private ?bool $isActive;

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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
