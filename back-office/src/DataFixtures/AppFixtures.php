<?php

namespace App\DataFixtures;
use App\Entity\Cinema;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $lafayette=new Cinema('Le Lafayette',"cinéma à l'ancienne",'12, rue des fleurs');

        $manager->persist($lafayette);

        $manager->flush();
    }
}
