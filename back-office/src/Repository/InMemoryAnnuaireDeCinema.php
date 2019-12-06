<?php


namespace App\Repository;


use App\Domain\AnnuaireDeCinemas;
use App\Domain\Cinema;

class InMemoryAnnuaireDeCinema implements AnnuaireDeCinemas
{
    public function tousLesCinemas(): iterable
    {
        return [
            new Cinema("MegaCGR","12 rue des fleurs",""),
        ];
    }
}