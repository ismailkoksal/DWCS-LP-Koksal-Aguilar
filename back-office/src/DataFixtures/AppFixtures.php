<?php

namespace App\DataFixtures;
use App\Entity\Cinema;
use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $cgr = new Cinema('MegaCGR',"cinéma à l'ancienne",'12, rue des fleurs');
        $interstelar = new Film("Interstelar", "oirept,prz,t,r", "");

        $manager->persist($cgr);
        $manager->persist($interstelar);
        $manager->flush();
    }
}
