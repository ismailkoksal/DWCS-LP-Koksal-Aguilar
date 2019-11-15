<?php 
namespace App\Domain\Query;
use App\Domain\AnnuaireDeFilms;

class ListeFilmsHandler {
    private $annuaire;

    public function __construct(AnnuaireDeFilms $annuaire) {
        $this->annuaire = $annuaire;
    }

    public function handle(ListeFilmsQuery $requete): iterable {
        return $this->annuaire->tousLesFilms();
    }
}