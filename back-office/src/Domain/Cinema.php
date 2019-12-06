<?php

namespace App\Domain;

class Cinema {
    private $nom;
    private $adresse;
    private $thirdP;

    public function __construct(string $nom, string $adresse, string $thirdP) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->thirdP = $thirdP;
    }

    public function getNom(): string {
        return $this->nom;
    }
}