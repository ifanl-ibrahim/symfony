<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct()
    {
        $this->faker = \Faker\Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        // create 20 users! Bam!
        for ($i = 0; $i < 20; $i++) {
            $user = new Users();
            $user->setEmail($this->faker->email());
            $user->setPassword($this->faker->password());
            $user->setFirstname($this->faker->firstName());
            $user->setLastname($this->faker->lastName());
            $manager->persist($user);
            $manager->flush();
        }
    }
}
