<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class Users extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    private $manager;
    private Generator $faker;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $this->manager = $manager;
        $this->loadUser();
        $this->loadAdmin();
        $this->loadUsersFixtures();
        $manager->flush();
    }

    public function loadUser()
    {
        $user = new \App\Entity\Users();
        $user->setNom('user_nom')
            ->setPrenom('user_prenom')
            ->setUsername('user')
            ->setEmail('user@gmail.com')
            ->setPassword($this->hasher->hashPassword($user, 'user'))
            ->setRoles((array)'ROLE_USER')
            ->setIsActive(1);
        $this->manager->persist($user);
    }

    public function loadAdmin()
    {
        $user = new \App\Entity\Users();
        $user->setNom('admin_nom')
            ->setPrenom('admin_prenom')
            ->setUsername('admin')
            ->setEmail('admin@gmail.com')
            ->setPassword($this->hasher->hashPassword($user, 'admin'))
            ->setRoles((array)'ROLE_ADMIN')
            ->setIsActive(1);
        $this->manager->persist($user);
    }

    public function loadUsersFixtures()
    {
        for ($i = 1; $i < 1000; $i++) {
            $user = new  \App\Entity\Users();
            $name = $this->faker->name();
            $user->setNom($name)
                ->setPrenom($this->faker->lastName())
                ->setUsername($this->faker->userName())
                ->setEmail($this->faker->email())
                ->setPassword($this->hasher->hashPassword($user, $name))
                ->setRoles((array)'ROLE_USER')
                ->setIsActive($this->faker->boolean());
            $this->manager->persist($user);
        }
        $this->manager->flush();
    }
}
