<?php

namespace App\Tests\Unit;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Categories;
use App\Entity\Tools;

class ToolsTest extends ApiTestCase
{
    private Tools $tools;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tools = new Tools();
    }

    protected function getEntity(): Tools
    {
        return (new Tools())
            ->setNom('test')
            ->setCategory(new Categories())
            ->setDescription('blabla test')
            ->setLink('https://test.com')
            ->setCreatedAt(new \DateTimeImmutable("2022-05-09 14:38:00"))
            ->setIsActive(true);
    }

    public function testInstanceOfEntity(): void
    {
        $this->assertInstanceOf(Tools::class, $this->getEntity());
    }

    public function testHasAttributesEntity(): void
    {
        $this->assertObjectHasAttribute('nom', $this->getEntity());
        $this->assertObjectHasAttribute('Category', $this->getEntity());
        $this->assertObjectHasAttribute('description', $this->getEntity());
        $this->assertObjectHasAttribute('link', $this->getEntity());
        $this->assertObjectHasAttribute('createdAt', $this->getEntity());
        $this->assertObjectHasAttribute('isActive', $this->getEntity());
    }

    public function testGetNom(): void
    {
        $response = $this->tools->setNom($this->getEntity()->getNom());
        $this->assertEquals($this->getEntity()->getNom(), $this->tools->getNom());
    }

    public function testGetDescription(): void
    {
        $response = $this->tools->setDescription($this->getEntity()->getDescription());
        $this->assertEquals($this->getEntity()->getDescription(), $this->tools->getDescription());
    }

    public function testGetLink(): void
    {
        $response = $this->tools->setLink($this->getEntity()->getLink());
        $this->assertEquals($this->getEntity()->getLink(), $this->tools->getLink());
    }

    public function testGetCreatedAt(): void
    {
        $response = $this->tools->setCreatedAt($this->getEntity()->getCreatedAt());
        $this->assertEquals($this->getEntity()->getCreatedAt(), $this->tools->getCreatedAt());
    }

    public function testGetIsActive(): void
    {
        $response = $this->tools->setIsActive($this->getEntity()->getIsActive());
        $this->assertEquals($this->getEntity()->getIsActive(), $this->tools->getIsActive());
    }

    public function testGetIsCategory(): void
    {
        $response = $this->tools->setCategory($this->getEntity()->getCategory());
        $this->assertEquals($this->getEntity()->getCategory(), $this->tools->getCategory());
    }

    public function testTypeStringNom(): void
    {
        $this->assertIsString($this->getEntity()->getNom());
        $this->assertNotEmpty($this->getEntity()->getNom());
    }

    public function testTypeStringDescription(): void
    {
        $this->assertIsString($this->getEntity()->getDescription());
        $this->assertNotEmpty($this->getEntity()->getDescription());
    }

    public function testTypeStringLink(): void
    {
        $this->assertIsString($this->getEntity()->getLink());
        $this->assertNotEmpty($this->getEntity()->getLink());
    }

    public function testTypeBooleanIsActive(): void
    {
        $this->assertIsBool($this->getEntity()->getIsActive());
        $this->assertIsNotInt($this->getEntity()->getIsActive());
        $this->assertIsNotString($this->getEntity()->getIsActive());
    }

    public function testInstanceOfDateTimeImmutableCreateAt(): void
    {
        $this->assertInstanceOf(\DateTimeImmutable::class, $this->getEntity()->getCreatedAt());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}