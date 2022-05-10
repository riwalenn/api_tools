<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ApiResource(
    collectionOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['item']]
        ],
        'post',
    ],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['item']]
        ],
        'put',
        'patch'
    ],
    attributes: ["pagination_enabled" => false]
)]
#[ApiFilter(SearchFilter::class, properties: [
    'nom' => SearchFilter::STRATEGY_PARTIAL
])]
#[ApiFilter(OrderFilter::class, properties: ['id'], arguments: ['orderParameterName' => 'order'])]
#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['item'])]
    private $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    #[Groups(['item'])]
    private string $nom;

    #[ORM\Column(name: 'prenom', type: 'string', length: 255, nullable: false)]
    #[Groups(['users'])]
    private string $prenom;

    #[ORM\Column(name: 'username', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    #[Groups(['item'])]
    private string $username;

    #[ORM\Column(name: 'email', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    #[Groups(['item'])]
    private string $email;

    #[ORM\Column(name: 'password', type: 'string', length: 255, nullable: false)]
    #[NotBlank]
    private string $password;

    #[ORM\Column(name: 'token', type: 'string', length: 255, nullable: true)]
    #[NotBlank]
    private string $token;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    #[NotBlank]
    private bool $isActive;

    #[ORM\Column(name: 'roles', type: 'array', length: 255, nullable: false)]
    #[NotBlank]
    private array $roles;

    #[ORM\ManyToMany(targetEntity: Categories::class)]
    #[ORM\JoinTable(name: 'users_categories')]
    private Collection $Category;

    #[ORM\OneToMany(mappedBy: FavoriteTools::class, targetEntity: FavoriteTools::class)]
    private FavoriteTools $favoriteTools;

    #[Pure] public function __construct()
    {
        $this->category = new ArrayCollection();
    }

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

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

    public function eraseCredentials()
    {

    }

    public function __call($name, $arguments)
    {
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->Category->contains($category)) {
            $this->Category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        $this->Category->removeElement($category);

        return $this;
    }

    public function getRoles(): ?array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getFavoriteTools(): ?FavoriteTools
    {
        return $this->favoriteTools;
    }

    public function setFavoriteTools(?FavoriteTools $favoriteTools): self
    {
        $this->favoriteTools = $favoriteTools;
        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }
}
