<?php

namespace App\Domain\Query;

class UnFilmQuery {
    private $nomFilm;

    public function __construct(string $nomFilm) {
        $this->nomFilm = $nomFilm;
    }

    public function getNomFilm(): string {
        return $this->nomFilm;
    }
}