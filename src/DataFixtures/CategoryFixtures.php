<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORY_TRAVEL_REFERENCE = 'category-travel';
    public const CATEGORY_DONKEY_REFERENCE = 'category-donkey';
    public const CATEGORY_TOYS_REFERENCE = 'category-toys';

    public function load(ObjectManager $manager): void
    {

        $travels = new Category();
        $travels->setName('Voyages');
        $manager->persist($travels);
        $this->addReference(self::CATEGORY_TRAVEL_REFERENCE, $travels);

        $donkeys = new Category();
        $donkeys->setName('Avec des anes');
        $donkeys->setParent($travels);
        $manager->persist($donkeys);
        $this->addReference(self::CATEGORY_DONKEY_REFERENCE, $donkeys);

        $toys = new Category();
        $toys->setName('Jouets');
        $manager->persist($toys);
        $this->addReference(self::CATEGORY_TOYS_REFERENCE, $toys);

        $manager->flush();
    }
}
