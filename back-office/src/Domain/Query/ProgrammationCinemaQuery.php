<?php

namespace App\Domain\Query;
use App\Entity\Cinema;

class ProgrammationCinemaQuery {
    private $cinema;

    public function __construct(Cinema $cinema) {
        $this->cinema = $cinema;
    }

    public function getCinema(): Cinema {
        return $this->cinema;
    }
}