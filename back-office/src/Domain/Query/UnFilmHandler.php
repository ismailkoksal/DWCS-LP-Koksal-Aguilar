<?php
namespace App\Domain\Query;
use App\Domain\CatalogueDeFilms;
use App\Entity\Film;

class UnFilmHandler {
    private $catalogue;

    public function __construct(CatalogueDeFilms $catalogue) {
        $this->catalogue = $catalogue;
    }

    public function handle(UnFilmQuery $requete): Film {
        return $this->catalogue->obtenirUnFilm($requete->getNomFilm());
    }

}