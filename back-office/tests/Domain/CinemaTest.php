<?php

namespace App\Tests\Domain;

use PHPUnit\Framework\TestCase;
use App\Entity\Cinema;

class CinemaTest extends TestCase
{
    public function test_un_cinema_expose_son_nom(){
        $cinema=new Cinema("Le Lafayette", "description", "addresse");
        $this->assertEquals("Le Lafayette",$cinema->getNom());
    }
}