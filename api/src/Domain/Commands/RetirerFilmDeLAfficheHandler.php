<?php
namespace App\Domain\Commands;
use App\Domain\ProgrammeDeCinema;

class RetirerFilmDeLAfficheHandler {
    private $programmationCinema;

    public function __construct(ProgrammeDeCinema $programmationCinema) {
        $this->programmationCinema = $programmationCinema;
    }

    public function handle(RetirerFilmDeLAfficheCommand $command): bool {
        return $this->programmationCinema->retirerFilmDeLAffiche($command->getFilm(), $command->getCinema());
    }
}