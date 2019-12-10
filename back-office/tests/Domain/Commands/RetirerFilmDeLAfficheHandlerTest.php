<?php

namespace App\Tests\Domain\Commands;
use App\Entity\Cinema;
use App\Domain\Commands\RetirerFilmDeLAfficheCommand;
use App\Domain\Commands\RetirerFilmDeLAfficheHandler;
use App\Entity\Film;
use App\Domain\ProgrammeDeCinema;
use PHPUnit\Framework\TestCase;

class RetirerFilmDeLAfficheHandlerTest extends TestCase {
    public function test_retirer_film() {
        $film = $this->createMock(Film::class);
        $cinema = $this->createMock(Cinema::class);
        $programmationCinema = $this->createMock(ProgrammeDeCinema::class);
        $command = new RetirerFilmDeLAfficheCommand($film, $cinema);
        $handler = new RetirerFilmDeLAfficheHandler($programmationCinema);

        $programmationCinema->expects($this->once())->method("retirerFilmDeLAffiche");
        $handler->handle($command);
    }
}
