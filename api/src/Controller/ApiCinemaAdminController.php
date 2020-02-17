<?php

namespace App\Controller;

use App\Entity\Cinema;
use App\Domain\Query\ListeCinemasHandler;
use App\Domain\Query\ListeCinemasQuery;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiCinemaAdminController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/cinemas", name="api_cinemas")
     */
    public function listeCinemas(ListeCinemasHandler $handler) {
        $query = new ListeCinemasQuery();
        $listeCinemas = $handler->handle($query);

        return $listeCinemas;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/cinemas/{id}")
     */
    public function getCinema(Cinema $cinema) {
        return $cinema;
    }
}
