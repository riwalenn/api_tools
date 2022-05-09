<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Categories;

class CategoryTest extends ApiTestCase
{
    private Categories $categories;

    protected function setUp(): void
    {
        parent::setUp();

        $this->categories = new Categories();
    }

    protected function getEntity(): Categories
    {
        return (new Categories())
            ->setNom('test nom catégorie')
            ->setIsActive(true);
    }

    public function testInstanceOfEntity(): void
    {
        $this->assertInstanceOf(Categories::class, $this->getEntity());
    }

    public function testHasAttributesEntity(): void
    {
        $this->assertObjectHasAttribute('nom', $this->getEntity());
        $this->assertObjectHasAttribute('isActive', $this->getEntity());
    }

    public function testGetNom(): void
    {
        $response = $this->categories->setNom($this->getEntity()->getNom());

        $this->assertEquals($this->getEntity()->getNom(), $this->categories->getNom());
    }

    public function testTypeStringNom(): void
    {
        $this->assertIsString($this->getEntity()->getNom());
        $this->assertNotEmpty($this->getEntity()->getNom());
    }

    public function testGetisActive(): void
    {
        $response = $this->categories->setIsActive($this->getEntity()->getIsActive());
        $this->assertEquals($this->getEntity()->getIsActive(), $this->categories->getIsActive());
    }

    public function testTypeBooleanIsActive(): void
    {
        $this->assertIsBool($this->getEntity()->getIsActive());
        $this->assertIsNotInt($this->getEntity()->getIsActive());
        $this->assertIsNotString($this->getEntity()->getIsActive());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}