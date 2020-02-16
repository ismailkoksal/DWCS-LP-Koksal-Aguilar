<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Domain\Query\ProgrammationCinemaHandler;
use App\Domain\Query\ProgrammationCinemaQuery;
use App\Domain\Commands\RetirerFilmDeLAfficheHandler;
use App\Domain\Commands\RetirerFilmDeLAfficheCommand;
use App\Entity\Cinema;
use App\Entity\Film;
use App\Entity\FilmAAffiche;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class ApiFilmAAficheController extends AbstractController
{
    /**
    * @Rest\View(serializerGroups={"filmsAAFiche"})
    * @Rest\Get("/api/filmsAAFiche/{id}")
    */
    public function listeFilmsAAfiche(Cinema $cinema, ProgrammationCinemaHandler $handler){
        $query = new ProgrammationCinemaQuery($cinema);
        $listeFilmsAAFiche = $handler->handle($query);
        return $listeFilmsAAFiche;
    }

    /**
     * @Rest\View()
     * @Rest\Post("/api/filmsAAFiche/{id_cinema}/{id_film}")
     * @ParamConverter("cinema", class="App\Entity\Cinema", options={"mapping": {"id_cinema": "id"}})
     * @ParamConverter("film", class="App\Entity\Film", options={"mapping": {"id_film": "id"}})
     */
    public function postFilmAAfiche(Cinema $cinema, Film $film, ProgrammationCinemaHandler $handler, ValidatorInterface $validator){
        $filmAAffiche = new FilmAAffiche($cinema,$film);

        $errors = $validator->validate($filmAAffiche);
        if (count($errors))
            return View::create($errors, Response::HTTP_FOUND);

        $query = new ProgrammationCinemaQuery($cinema);
        $handler->addFilmProgrammationCinema($query, $film);
        return View::create(['message' => 'FilmAAFiche added'], Response::HTTP_OK);
    }

    /**
     * @Rest\View()
     * @Rest\Delete("/api/filmsAAFiche/{id_cinema}/{id_film}")
     * @ParamConverter("cinema", class="App\Entity\Cinema", options={"mapping": {"id_cinema": "id"}})
     * @ParamConverter("film", class="App\Entity\Film", options={"mapping": {"id_film": "id"}})
     */
    public function deleteFilmAAfiche(Cinema $cinema, Film $film, RetirerFilmDeLAfficheHandler $handler)
    {
        $command = new RetirerFilmDeLAfficheCommand($film, $cinema);
        $handler->handle($command);
        return View::create(['message' => 'FilmAAFiche removed'], Response::HTTP_OK);
    }
}
