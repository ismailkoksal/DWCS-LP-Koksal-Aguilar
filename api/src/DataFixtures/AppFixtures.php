<?php

namespace App\DataFixtures;
use App\Entity\Cinema;
use App\Entity\Film;
use App\Entity\FilmAAffiche;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $cgr = new Cinema('MegaCGR',"12, rue des fleurs","Cinema a l'anciene");
        $interstelar = new Film("Interstelar", "oirept,prz,t,r", "");
        $toyStory = new Film("Toy Story", "It is the story of Andy's toys", "");
        $affiche = new FilmAAffiche($cgr, $interstelar);

        $manager->persist($cgr);
        $manager->persist($interstelar);
        $manager->persist($toyStory);
        $manager->persist($affiche);
        $manager->flush();
    }
}
