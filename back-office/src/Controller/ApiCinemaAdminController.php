<?php

namespace App\Controller;

use App\Domain\Cinema;
use App\Domain\Query\ListeCinemasHandler;
use App\Domain\Query\ListeCinemasQuery;
use App\Domain\Query\ProgrammationCinemaHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiCinemaAdminController extends AbstractController
{
    /**
     * @Route("/api/cinema/admin", name="api_cinema_admin")
     */
    public function index()
    {
        return $this->render('api_cinema_admin/index.html.twig', [
            'controller_name' => 'ApiCinemaAdminController',
        ]);
    }

    /**
     * @Route("/api/cinemas", name="api_cinemas", methods={"GET"})
     */
    public function listeCinemas(ListeCinemasHandler $handler, SerializerInterface $serializer) {
        $query = new ListeCinemasQuery();
        $listeCinemas = $handler->handle($query);

        $listeCinemasJson = $serializer->serialize($listeCinemas, 'json');

        return new JsonResponse($listeCinemasJson, 200, [], true);
    }
}
