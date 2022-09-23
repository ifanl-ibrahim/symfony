<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Users;
use App\Entity\Articles;
use App\Entity\Comments;
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

            $article = new Articles();
            $article->setTitle($this->faker->title());
            $article->setContent($this->faker->text());
            $article->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTime()));
            $article->setAuthor($user);
            $manager->persist($article);

            $comment = new Comments();
            $comment->setContent($this->faker->text());
            $comment->setCreatedAt(DateTimeImmutable::createFromMutable($this->faker->dateTime()));
            $comment->setArticleId($article);
            $manager->persist($comment);

            $manager->flush();
        }
    }
}
