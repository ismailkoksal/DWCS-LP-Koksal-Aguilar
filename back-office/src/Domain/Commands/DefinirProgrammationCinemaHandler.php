<?php

namespace App\Domain\Commands;
use App\Domain\ProgrammeDeCinema;
use App\Entity\FilmAAffiche;

class DefinirProgrammationCinemaHandler
{
    private $programmeDeCinema;

    public function __construct(ProgrammeDeCinema $programmeDeCinema)
    {
        $this->programmeDeCinema = $programmeDeCinema;
    }

    public function handle(DefinirProgrammationCinemaCommand $command)
    {   
        $this->programmeDeCinema->videProgrammation($command->getCinema());
        foreach ($command->getProgrammationDeCinema() as $affiche) 
        {
            $this->programmeDeCinema->mettreFilmAAffiche($affiche->getFilm(), $affiche->getCinema());
        }
    }
}