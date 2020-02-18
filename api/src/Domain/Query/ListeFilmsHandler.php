<?php 
namespace App\Domain\Query;
use App\Domain\CatalogueDeFilms;
use App\Entity\Film;

class ListeFilmsHandler {
    private $annuaire;

    public function __construct(CatalogueDeFilms $annuaire) {
        $this->annuaire = $annuaire;
    }

    public function handle(ListeFilmsQuery $requete): iterable {
        return $this->annuaire->tousLesFilms();
    }

    public function addFilm(Film $film) {
        $this->annuaire->ajouterFilm($film);
    }
}