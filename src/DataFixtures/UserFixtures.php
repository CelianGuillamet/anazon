<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{


  public function load(ObjectManager $manager): void
  {
    $user = new User();
    $user->setEmail('admin@admin.com');
    $user->setPassword('$2y$13$bUa77x1MBkS./zIQzb3D2uKQ4LpnYjbCIMSleC9QafU66eDN5z4..');
    $user->setRoles(['ROLE_ADMIN']);
    $manager->persist($user);
    $manager->flush();
  }
}
