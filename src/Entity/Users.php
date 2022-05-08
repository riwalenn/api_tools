<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\Users")
 */
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'nom', type: 'string', length: 255, nullable: false)]
    private string $nom;

    #[ORM\Column(name: 'prenom', type: 'string', length: 255, nullable: false)]
    private string $prenom;

    #[ORM\Column(name: 'username', type: 'string', length: 255, nullable: false)]
    private string $username;

    #[ORM\Column(name: 'email', type: 'string', length: 255, nullable: false)]
    private string $email;

    #[ORM\Column(name: 'password', type: 'string', length: 255, nullable: false)]
    private string $password;

    #[ORM\Column(name: 'token', type: 'string', length: 255, nullable: true)]
    private string $token;

    #[ORM\Column(name: 'is_active', type: 'boolean', nullable: false)]
    private bool $isActive;

    #[ORM\Column(name: 'roles', type: 'array', length: 255, nullable: false)]
    private array $roles;

    #[ORM\ManyToMany(targetEntity: Categories::class)]
    private Collection $Category;

    #[ORM\OneToMany(targetEntity: FavoriteTools::class)]
    private FavoriteTools $favoriteTools;

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

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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

    /**
     * @return Collection<int, FavoriteTools>
     */
    public function getFavoriteTools(): Collection
    {
        return $this->favoriteTools;
    }

    public function addFavoriteTool(FavoriteTools $favoriteTool): self
    {
        if (!$this->favoriteTools->contains($favoriteTool)) {
            $this->favoriteTools[] = $favoriteTool;
            $favoriteTool->setUsers($this);
        }

        return $this;
    }

    public function removeFavoriteTool(FavoriteTools $favoriteTool): self
    {
        if ($this->favoriteTools->removeElement($favoriteTool)) {
            // set the owning side to null (unless already changed)
            if ($favoriteTool->getUsers() === $this) {
                $favoriteTool->setUsers(null);
            }
        }

        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }
}
