<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Film;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Domain\Query\ListeFilmsHandler;
use App\Domain\Query\ListeFilmsQuery;
use App\Domain\Query\UnFilmHandler;
use App\Domain\Query\UnFilmQuery;

class ApiFilmController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/films")
     */
    public function listFilms(ListeFilmsHandler $handler) 
    {
        $query = new ListeFilmsQuery();
        $films = $handler->handle($query);
        return $films;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/films/{id}")
     */
    public function getFilm(int $id, UnFilmHandler $handler)
    {
        $query = new UnFilmQuery($id);
        $film = $handler->handle($query);
        return $film;
    }
}
