<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Categories extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoryOne = new \App\Entity\Categories();
        $categoryOne->setNom("Graphisme, design, etc...")->setIsActive(1);
        $manager->persist($categoryOne);

        $categoryTwo = new \App\Entity\Categories();
        $categoryTwo->setNom("Prototypage")->setIsActive(1);
        $manager->persist($categoryTwo);

        $categoryThree = new \App\Entity\Categories();
        $categoryThree->setNom("Présentation et landing page")->setIsActive(1);
        $manager->persist($categoryThree);

        $categoryFour = new \App\Entity\Categories();
        $categoryFour->setNom("E-commerce")->setIsActive(1);
        $manager->persist($categoryFour);

        $categoryFive = new \App\Entity\Categories();
        $categoryFive->setNom("Social média")->setIsActive(1);
        $manager->persist($categoryFive);

        $categorySix = new \App\Entity\Categories();
        $categorySix->setNom("Emailing")->setIsActive(1);
        $manager->persist($categorySix);

        $categorySeven = new \App\Entity\Categories();
        $categorySeven->setNom("Gestion de projet")->setIsActive(1);
        $manager->persist($categorySeven);

        $categoryHeight = new \App\Entity\Categories();
        $categoryHeight->setNom("Vente")->setIsActive(1);
        $manager->persist($categoryHeight);

        $categoryNine = new \App\Entity\Categories();
        $categoryNine->setNom("Applications mobiles")->setIsActive(1);
        $manager->persist($categoryNine);

        $categoryTen = new \App\Entity\Categories();
        $categoryTen->setNom("Administratif, financier, réglementaire")->setIsActive(1);
        $manager->persist($categoryTen);

        $categoryEleven = new \App\Entity\Categories();
        $categoryEleven->setNom("Ressources Humaines")->setIsActive(1);
        $manager->persist($categoryEleven);

        $categoryTwelve = new \App\Entity\Categories();
        $categoryTwelve->setNom("Analytique et marketing")->setIsActive(1);
        $manager->persist($categoryTwelve);

        $categoryThirteen = new \App\Entity\Categories();
        $categoryThirteen->setNom("Growth hacking")->setIsActive(1);
        $manager->persist($categoryThirteen);

        $categoryFourteen = new \App\Entity\Categories();
        $categoryFourteen->setNom("RP et les médias")->setIsActive(1);
        $manager->persist($categoryFourteen);

        $categoryfifteen = new \App\Entity\Categories();
        $categoryfifteen->setNom("Autre catégorie")->setIsActive(1);
        $manager->persist($categoryfifteen);

        $manager->flush();
    }
}
