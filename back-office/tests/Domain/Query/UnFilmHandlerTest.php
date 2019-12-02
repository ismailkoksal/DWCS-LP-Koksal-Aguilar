<?php

namespace App\Tests\Domain\Query;
use App\Domain\CatalogueDeFilms;
use App\Domain\Query\UnFilmQuery;
use App\Domain\Query\UnFilmHandler;
use PHPUnit\Framework\TestCase;

class UnFilmHandlerTest extends TestCase {
    public function test_obtenir_un_film() {
        $requete = new UnFilmQuery("Coco");
        $catalogue = $this->createMock(CatalogueDeFilms::class);
        $handler = new UnFilmHandler($catalogue);

        $catalogue->expects($this->once())->method("obtenirUnFilm");
        $result = $handler->handle($requete);
    }
}