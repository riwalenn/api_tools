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
            ->setNom('test')
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
    }

    public function testGetIsActive(): void
    {
        $value = true;

        $response = $this->categories->setIsActive(true);
        $this->assertInstanceOf(Categories::class, $response);
        $this->assertIsBool($value);
    }

    public function testTypeBooleanIsActive(): void
    {
        $this->assertIsBool($this->getEntity()->getIsActive());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
}