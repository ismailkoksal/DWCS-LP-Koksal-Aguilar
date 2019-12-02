<?php

namespace App\Domain\Commands;
use App\Domain\ProgrammeDeCinema;
use App\Domain\Film;
use App\Domain\Cinema;

class MettreFilmAAfficheHandler {
    private $programmationCinema;

    public function __construct(ProgrammeDeCinema $programmationCinema) {
        $this->programmationCinema = $programmationCinema;
    }

    public function handle(MettreFilmAAfficheCommand $command): bool {
        return $this->programmationCinema->mettreFilmAAffiche($command->getFilm(), $command->getCinema());
    }
}