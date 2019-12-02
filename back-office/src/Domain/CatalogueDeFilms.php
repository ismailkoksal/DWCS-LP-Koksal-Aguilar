<?php

namespace App\Domain;

interface CatalogueDeFilms {
    public function tousLesFilms():iterable;

    public function obtenirUnFilm(string $nomFilm): Film;
}