<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setTitle('Voyage en Italie');
        $product->setPrice(1000);
        $product->setDescription('Voyage en Italie');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_NAME_REFERENCE));
        $manager->persist($product);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
