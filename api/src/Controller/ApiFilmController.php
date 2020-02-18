<?php

namespace App\Controller;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Film;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Domain\Query\ListeFilmsHandler;
use App\Domain\Query\ListeFilmsQuery;
use App\Domain\Query\UnFilmHandler;
use App\Domain\Query\UnFilmQuery;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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

    /**
     * @Rest\View()
     * @Rest\Post("/api/films")
     */
    public function addFilm(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, ListeFilmsHandler $handler)
    {
        $data = $request->getContent();
        $film = $serializer->deserialize($data,Film::class, 'json');
        $errors = $validator->validate($film);

        if (count($errors))
            return View::create($errors, Response::HTTP_BAD_REQUEST);

        $handler->addFilm($film);
        return View::create(["message" => "Film created."], Response::HTTP_OK);
    }
}
