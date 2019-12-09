<?php

namespace App\Tests\Domain;

use PHPUnit\Framework\TestCase;
use App\Domain\Cinema;

class CinemaTest extends TestCase
{
    public function test_un_cinema_expose_son_nom(){
        $cinema=new Cinema("Le Lafayette", "12 rue des fleurs", "Le film Le Lafayette a été réalisé en 2019");
        $this->assertEquals("Le Lafayette",$cinema->getNom());
    }

    public function test_un_cinema_expose_son_adresse(){
        $cinema=new Cinema("Le Lafayette", "12 rue des fleurs", "Le film Le Lafayette a été réalisé en 2019");
        $this->assertEquals("12 rue des fleurs",$cinema->getAdresse());
    }

    public function test_un_cinema_expose_sa_description(){
        $cinema=new Cinema("Le Lafayette", "12 rue des fleurs", "Le film Le Lafayette a été réalisé en 2019");
        $this->assertEquals("Le film Le Lafayette a été réalisé en 2019",$cinema->getDescription());
    }
}