<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->setEyesColor("green");
            $user->setName("Bobette");
            $user->setGender("female");
            $manager->persist($user);
        }
        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->setEyesColor("blue");
            $user->setName("Bob");
            $user->setGender("male");
            $manager->persist($user);
        }
        $manager->flush();
    }
}
