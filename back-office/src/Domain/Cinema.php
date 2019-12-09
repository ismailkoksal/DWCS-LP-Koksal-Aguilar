<?php

namespace App\Domain;

class Cinema {
    private $nom;
    private $adresse;
    private $description;

    public function __construct(string $nom, string $adresse, string $description) {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->description = $description;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getAdresse(): string {
        return $this->adresse;
    }

    public function getDescription(): string {
        return $this->description;
    }
}