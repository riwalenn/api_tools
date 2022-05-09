<?php

namespace App\Tests\Unit;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Categories;
use App\Entity\FavoriteTools;
use App\Entity\Users;

class FavoritesTest extends ApiTestCase
{
    private FavoriteTools $favoriteTools;

    protected function setUp(): void
    {
        parent::setUp();

        $this->favoriteTools = new FavoriteTools();
    }

    protected function getEntity(): FavoriteTools
    {
        return (new FavoriteTools())
            ->setUsers(new Users())
            ->setCategory(new Categories())
            ->setIsBroken(false)
            ->setIsLiked(true)
            ->setIsUnliked(false)
            ->setIsFavorite(true)
            ->setTags('tag1, tag2')
            ->setNote('blebleble note')
            ->setIsActive(true);
    }

    public function testInstanceOfEntity(): void
    {
        $this->assertInstanceOf(FavoriteTools::class, $this->getEntity());
    }

    public function testhasAttributesEntity(): void
    {
        $this->assertObjectHasAttribute('Users', $this->getEntity());
        $this->assertObjectHasAttribute('Category', $this->getEntity());
        $this->assertObjectHasAttribute('isBroken', $this->getEntity());
        $this->assertObjectHasAttribute('isLiked', $this->getEntity());
        $this->assertObjectHasAttribute('isUnliked', $this->getEntity());
        $this->assertObjectHasAttribute('isFavorite', $this->getEntity());
        $this->assertObjectHasAttribute('tags', $this->getEntity());
        $this->assertObjectHasAttribute('note', $this->getEntity());
        $this->assertObjectHasAttribute('isActive', $this->getEntity());
    }

    public function testGetIsUsers(): void
    {
        $response = $this->favoriteTools->setUsers($this->getEntity()->getUsers());
        $this->assertEquals($this->getEntity()->getUsers(), $this->favoriteTools->getUsers());
    }

    public function testGetIsCategory(): void
    {
        $response = $this->favoriteTools->setCategory($this->getEntity()->getCategory());
        $this->assertEquals($this->getEntity()->getCategory(), $this->favoriteTools->getCategory());
    }

    public function testGetIsBroken(): void
    {
        $response = $this->favoriteTools->setIsBroken($this->getEntity()->getIsBroken());
        $this->assertEquals($this->getEntity()->getIsBroken(), $this->favoriteTools->getIsBroken());
    }

    public function testGetIsLiked(): void
    {
        $response = $this->favoriteTools->setIsLiked($this->getEntity()->getIsLiked());
        $this->assertEquals($this->getEntity()->getIsLiked(), $this->favoriteTools->getIsLiked());
    }

    public function testGetIsUnliked(): void
    {
        $response = $this->favoriteTools->setIsUnliked($this->getEntity()->getIsUnliked());
        $this->assertEquals($this->getEntity()->getIsUnliked(), $this->favoriteTools->getIsUnliked());
    }

    public function testGetIsFavorite(): void
    {
        $response = $this->favoriteTools->setIsFavorite($this->getEntity()->getIsFavorite());
        $this->assertEquals($this->getEntity()->getIsFavorite(), $this->favoriteTools->getIsFavorite());
    }

    public function testGetTags(): void
    {
        $response = $this->favoriteTools->setTags($this->getEntity()->getTags());
        $this->assertEquals($this->getEntity()->getTags(), $this->favoriteTools->getTags());
    }

    public function testGetNote(): void
    {
        $response = $this->favoriteTools->setNote($this->getEntity()->getNote());
        $this->assertEquals($this->getEntity()->getNote(), $this->favoriteTools->getNote());
    }

    public function testGetIsActive(): void
    {
        $response = $this->favoriteTools->setIsActive($this->getEntity()->getIsActive());
        $this->assertEquals($this->getEntity()->getIsActive(), $this->favoriteTools->getIsActive());
    }

    public function testTypeBooleanIsBroken(): void
    {
        $this->assertIsBool($this->getEntity()->getIsBroken());
        $this->assertIsNotInt($this->getEntity()->getIsBroken());
        $this->assertIsNotString($this->getEntity()->getIsBroken());
    }

    public function testTypeBooleanIsLiked(): void
    {
        $this->assertIsBool($this->getEntity()->getIsLiked());
        $this->assertIsNotInt($this->getEntity()->getIsLiked());
        $this->assertIsNotString($this->getEntity()->getIsLiked());
    }

    public function testTypeBooleanIsUnliked(): void
    {
        $this->assertIsBool($this->getEntity()->getIsUnliked());
        $this->assertIsNotInt($this->getEntity()->getIsUnliked());
        $this->assertIsNotString($this->getEntity()->getIsUnliked());
    }

    public function testTypeBooleanIsFavorite(): void
    {
        $this->assertIsBool($this->getEntity()->getIsFavorite());
        $this->assertIsNotInt($this->getEntity()->getIsFavorite());
        $this->assertIsNotString($this->getEntity()->getIsFavorite());
    }

    public function testTypeBooleanIsActive(): void
    {
        $this->assertIsBool($this->getEntity()->getIsActive());
        $this->assertIsNotInt($this->getEntity()->getIsActive());
        $this->assertIsNotString($this->getEntity()->getIsActive());
    }

    public function testTypeStringTags(): void
    {
        $this->assertIsString($this->getEntity()->getTags());
    }

    public function testTypeStringNote(): void
    {
        $this->assertIsString($this->getEntity()->getNote());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}