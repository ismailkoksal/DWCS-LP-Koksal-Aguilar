<?php
namespace App\Domain;

interface ProgrammeDeCinema {
    public function getFilmsPourCinema():iterable;

    public function mettreFilmAAffiche(Film $film, Cinema $cinema): bool;

    public function retirerFilmDeLAffiche(Film $film, Cinema $cinema): bool;
}