<?php

namespace App\Domain;

class Cinema {
    private $nom;

    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    public function getNom(): string {
        return $this->nom;
    }
}