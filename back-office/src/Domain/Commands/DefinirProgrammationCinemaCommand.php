<?php

namespace App\Domain\Commands;
use App\Entity\Cinema;
use App\Entity\Film;
use App\Entity\FilmAAffiche;

class DefinirProgrammationCinemaCommand
{
    private $programmationCinema;
    private $cinema;

    public function __construct(array $films, Cinema $cinema)
    {   
        $this->cinema = $cinema;
        $this->programmationCinema = [];
        foreach ($films as $film) {
            $affiche = new FilmAAffiche($cinema, $film);
            array_push($this->programmationCinema, $affiche);
        }
    }

    public function getProgrammationDeCinema()
    {
        return $this->programmationCinema;
    }

    public function getFilms()
    {
        $films = [];
        foreach ($this->programmationCinema as $affiche) {
            array_push($films, $affiche->getFilm());
        }
        return $films;
    }

    public function getCinema(): ?Cinema
    {
        return $this->cinema;
    }
}