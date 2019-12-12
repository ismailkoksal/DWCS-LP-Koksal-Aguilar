<?php

namespace App\Domain\Query;

class UnFilmQuery {
    private $idFilm;

    public function __construct(int $idFilm) {
        $this->idFilm = $idFilm;
    }

    public function getIdFilm(): int {
        return $this->idFilm;
    }
}