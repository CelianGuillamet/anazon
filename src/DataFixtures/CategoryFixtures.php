<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_NAME_REFERENCE = 'category-name';

    public function load(ObjectManager $manager): void
    {

        $travels = new Category();
        $travels->setName('Voyages');
        $manager->persist($travels);
        $this->addReference(self::CATEGORY_NAME_REFERENCE, $travels);

        $donkeys = new Category();
        $donkeys->setName('Avec des anes');
        $donkeys->setParent($travels);
        $manager->persist($donkeys);

        $toys = new Category();
        $toys->setName('Jouets');
        $manager->persist($toys);

        $manager->flush();
    }
}
