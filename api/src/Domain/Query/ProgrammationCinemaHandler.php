<?php
namespace App\Domain\Query;
use App\Domain\ProgrammeDeCinema;
use App\Entity\Film;

class ProgrammationCinemaHandler {
    private $programme;

    public function __construct(ProgrammeDeCinema $programme) {
        $this->programme = $programme;
    }

    public function handle(ProgrammationCinemaQuery $requete): iterable {
        return $this->programme->getFilmsPourCinema($requete->getCinema());
    }

    public function addFilmProgrammationCinema(ProgrammationCinemaQuery $query, Film $film) {
        $this->programme->mettreFilmAAffiche($film, $query->getCinema());
    }

    public function removeFilmProgrammationCinema(ProgrammationCinemaQuery $query, Film $film) {
        $this->programme->retirerFilmDeLAffiche($film, $query->getCinema());
    }
}