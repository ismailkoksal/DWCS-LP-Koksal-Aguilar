<?php 
namespace App\Domain\Query;
use App\Domain\CatalogueDeFilms;

class ListeFilmsHandler {
    private $annuaire;

    public function __construct(CatalogueDeFilms $annuaire) {
        $this->annuaire = $annuaire;
    }

    public function handle(ListeFilmsQuery $requete): iterable {
        return $this->annuaire->tousLesFilms();
    }
}