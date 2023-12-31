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
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_TRAVEL_REFERENCE));
        $manager->persist($product);

        $travelDonkey = new Product();
        $travelDonkey->setTitle('Voyage en Italie avec des anes');
        $travelDonkey->setPrice(2000);
        $travelDonkey->setDescription('Voyage en Italie avec des anes');
        $travelDonkey->setCategory($this->getReference(CategoryFixtures::CATEGORY_DONKEY_REFERENCE));
        $manager->persist($travelDonkey);

        $toy = new Product();
        $toy->setTitle('G.I Joe');
        $toy->setPrice(10);
        $toy->setDescription('G.I Joe');
        $toy->setCategory($this->getReference(CategoryFixtures::CATEGORY_TOYS_REFERENCE));

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
