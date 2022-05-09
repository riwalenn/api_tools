<?php

namespace App\Tests\Unit;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Users;

class UsersTests extends ApiTestCase
{
    private Users $users;

    protected function setUp(): void
    {
        parent::setUp();

        $this->users = new Users();
    }

    protected function getEntity(): Users
    {
        return (new Users())
            ->setNom('test nom')
            ->setUsername('test username')
            ->setPrenom('test prénom')
            ->setPassword('un_mot_de_passe_au_aleatoire')
            ->setEmail('test@gmail.com')
            ->setToken('jsdlf45454d:s4fs4d7fdg487dfg7d8:4gdf4g')
            ->setRoles(['USER'])
            ->setIsActive(true);
    }

    public function testInstanceOfEntity(): void
    {
        $this->assertInstanceOf(Users::class, $this->getEntity());
    }

    public function testHasAttributesEntity(): void
    {
        $this->assertObjectHasAttribute('nom', $this->getEntity());
        $this->assertObjectHasAttribute('username', $this->getEntity());
        $this->assertObjectHasAttribute('password', $this->getEntity());
        $this->assertObjectHasAttribute('prenom', $this->getEntity());
        $this->assertObjectHasAttribute('email', $this->getEntity());
        $this->assertObjectHasAttribute('token', $this->getEntity());
        $this->assertObjectHasAttribute('isActive', $this->getEntity());
        $this->assertObjectHasAttribute('roles', $this->getEntity());
    }

    public function testGetNom(): void
    {
        $response = $this->users->setNom($this->getEntity()->getNom());
        $this->assertEquals($this->getEntity()->getNom(), $this->users->getNom());
    }

    public function testGetPrenom(): void
    {
        $response = $this->users->setPrenom($this->getEntity()->getPrenom());
        $this->assertEquals($this->getEntity()->getPrenom(), $this->users->getPrenom());
    }

    public function testGetPassword(): void
    {
        $response = $this->users->setPassword($this->getEntity()->getPassword());
        $this->assertEquals($this->getEntity()->getPassword(), $this->users->getPassword());
    }

    public function testGetUsername(): void
    {
        $response = $this->users->setUsername($this->getEntity()->getUsername());
        $this->assertEquals($this->getEntity()->getUsername(), $this->users->getUsername());
    }

    public function testGetEmail(): void
    {
        $response = $this->users->setEmail($this->getEntity()->getEmail());
        $this->assertEquals($this->getEntity()->getEmail(), $this->users->getEmail());
    }

    public function testGetToken(): void
    {
        $response = $this->users->setToken($this->getEntity()->getToken());
        $this->assertEquals($this->getEntity()->getToken(), $this->users->getToken());
    }

    public function testGetIsActive(): void
    {
        $response = $this->users->setIsActive($this->getEntity()->getIsActive());
        $this->assertEquals($this->getEntity()->getIsActive(), $this->users->getIsActive());
    }

    public function testGetRoles(): void
    {
        $response = $this->users->setRoles($this->getEntity()->getRoles());
        $this->assertEquals($this->getEntity()->getRoles(), $this->users->getRoles());
    }

    public function testTypeStringNom(): void
    {
        $this->assertIsString($this->getEntity()->getNom());
        $this->assertNotEmpty($this->getEntity()->getNom());
    }

    public function testTypeStringPrenom(): void
    {
        $this->assertIsString($this->getEntity()->getPrenom());
        $this->assertNotEmpty($this->getEntity()->getPrenom());
    }

    public function testTypeStringUsername(): void
    {
        $this->assertIsString($this->getEntity()->getUsername());
        $this->assertNotEmpty($this->getEntity()->getUsername());
    }

    public function testTypeStringToken(): void
    {
        $this->assertIsString($this->getEntity()->getToken());
        $this->assertNotEmpty($this->getEntity()->getToken());
    }

    public function testTypeStringEmail(): void
    {
        $this->assertIsString($this->getEntity()->getEmail());
        $this->assertNotEmpty($this->getEntity()->getEmail());
    }

    public function testTypeBooleanIsActive(): void
    {
        $this->assertIsBool($this->getEntity()->getIsActive());
        $this->assertIsNotInt($this->getEntity()->getIsActive());
        $this->assertIsNotString($this->getEntity()->getIsActive());
    }

    public function testTypeArrayRoles(): void
    {
        $this->assertIsArray($this->getEntity()->getRoles());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}