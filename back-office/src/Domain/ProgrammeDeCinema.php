<?php

namespace App\Domain;
interface ProgrammeDeCinema {
    public function getFilmsPourCinema():iterable;
}