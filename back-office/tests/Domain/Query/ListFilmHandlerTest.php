<?php 
namespace App\Tests\Domain\Query;

use PHPUnit\Framework\TestCase;
use App\Domain\CatalogueDeFilms;
use App\Domain\Query\ListeFilmsQuery;
use App\Domain\Query\ListeFilmsHandler;

class ListFilmHandlerTest extends TestCase {

    public function test_obtenir_la_list_de_films() {
        $requete = new ListeFilmsQuery();
        $annuaire = $this->createMock(CatalogueDeFilms::class);
        $handler = new ListeFilmsHandler($annuaire);

        $annuaire->expects($this->once())->method("tousLesFilms");

        $listeFilms = $handler->handle($requete);
    }

}
